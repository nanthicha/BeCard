<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$userName = Auth::user()->name;
    	$users = User::all();
    	return $userName;
    }
    public function setting(){
    	$userName = Auth::user()->name;
    	return view('setting', ['name' => $userName]);
    }

    public function updateProfile(){
        $name = request()->name;
        $email = request()->email;
        DB::table('users')
                    ->where('email', $email)
                    ->update(['name' => $name,'updated_at' => date('Y-m-d H:i:s')]);
        return back()
            ->with('successProfile','You have successfully update profile.');
    }
}
