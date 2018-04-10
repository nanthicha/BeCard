<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageUploadController extends Controller

{

    public function imageUpload(){
        return view('imageUpload');
    }

    public function imageUploadPost()
    {
        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        $type = request()->type;
        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        if ($type == 0){ // Profile Picture
        	$username = request()->username;
        	$imageName = $username."_".time().'.'.request()->image->getClientOriginalExtension();
        	request()->image->move(public_path('img/users'), $imageName);
			DB::table('users')
			            ->where('name', $username)
			            ->update(['image' => $imageName]);
        }else{
        	request()->image->move(public_path('img'), $imageName);
        }

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }

}