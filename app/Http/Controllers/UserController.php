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
    	$userName = Auth::user()->username;
    	$users = User::all();
    	return $userName;
    }
    public function setting(){
    	$userName = Auth::user()->username;
    	return view('setting', ['name' => $userName]);
    }

    public function reward(){
        $numberOfPaginate = 6;
        $rewards = DB::table('vouchers')->where('vouchers.status','1')->orderBy('bePoint','desc')->join('shops', 'vouchers.shop_id', '=', 'shops.id')->select('vouchers.*','shops.name as shopname','shops.logo')->paginate($numberOfPaginate);
        $bepointlog = DB::table('bepoint_logs')->where('username',Auth::user()->username)->orderBy('id','desc')->get();
        return view('reward', ['users' => $rewards,'bepointlog'=>$bepointlog]);
    }

    public function affiliate(){
        $userName = Auth::user()->username;
        return view('affiliate', ['name' => $userName]);
    }

    public function updateProfile(){
        $name = request()->name;
        $email = request()->email;
        $sex = request()->sex;
        $phone = request()->phone;
        $dob = request()->dob;
        DB::table('users')
                    ->where('email', $email)
                    ->update(['name' => $name,'sex' => $sex,'dob' => $dob,'phone' => $phone,'updated_at' => date('Y-m-d H:i:s')]);

        // Logs
        $owner = \App\User::where('email', $email)->first()->username;
        $log = new LogController;
        $log->record($owner,'Updated profile infomation.','');

        return back()
            ->with('successProfile','You have successfully update profile.');
    }

    public function adminUpdateProfile(){
        $email = request()->email;
        $role = request()->role;
        DB::table('users')
                    ->where('email', $email)
                    ->update(['role' => $role]);

        // Logs
        $assigID = \App\User::where('email', $email)->first()->username;
        $log = new LogController;
        $log->record(Auth::user()->username,'Changed role to '.$role,$assigID);

        return back()
            ->with('successProfile','You have successfully update role.');
    }

}



