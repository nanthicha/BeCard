<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Shop;

class ApiController extends Controller
{
    public function cashierStep1(Request $request){
    	$find = DB::table('users')->where('phone', '=', $request->message)->orWhere('private_key', '=',$request->message)->first();
    	if ($request->message == ""){
    		$status = "error";
    		$responseData = "no-input";
    	}else{
	    	if($find != ""){
	    		$status = "success";
	    		$responseData = $find->username;
	    	}
	    	else{
	    		$status = "error";
	    		$responseData = "no";
	    	}
    	}

		$response = array(
		          'status' => $status,
		          'msg' => $responseData,
		      );
      	return response()->json($response);
    }
}
