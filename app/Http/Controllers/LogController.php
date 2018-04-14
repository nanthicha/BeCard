<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
  public function record($user,$msg,$to) {
    return DB::table('user_logs')->insert(
        ['username' => $user,
        'msg' => $msg,
        'assigned_to' => $to]
    );
   	// return "abc";
  }
  public function recordBePoint($username,$msg,$bepoint,$type) {
  	$user = \App\User::where('username', $username)->first();
  	if ($type == 0){
  		$balance = intval($user->bePoint + $bepoint);
  	}else{
  		$balance = intval($user->bePoint - $bepoint);
  	}
  	DB::table('users')->where('username', $username)->update(['bePoint' => $balance]);

    return DB::table('bepoint_logs')->insert(
        ['username' => $username,
        'msg' => $msg,
        'bepoint' => $bepoint,
    	'type' => $type,
    	'balance' => $balance]
    );
   	// return "abc";
  }
}
