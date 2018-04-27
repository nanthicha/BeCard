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
    		$card = "";
    	}else{
	    	if($find != ""){
	    		$status = "success";
	            $checkCashier = DB::table('cashiers')->where('username',Auth::user()->username)->first();
	            if ($checkCashier == ""){
	            	$card = "";
	                return view('cashier.no');
	            }else{
	            	$cards = $checkCashier->shop_id;
					$cardcheck = DB::table('user_cards')
					            ->join('membercards', 'membercards.id', '=', 'user_cards.card_id')
					            ->select('membercards.id','membercards.shop_id','user_cards.*','membercards.imageBG','membercards.name')
					            ->where('user_cards.username',$find->username)
					            ->where('membercards.shop_id',$checkCashier->shop_id)
					            ->get();
					if($cardcheck == ""){
						$card = "noRegister";
					}else{
						$card = $cardcheck;
					}
	            }
	    		$responseData = $find->username;
	    	}
	    	else{
	    		$status = "error";
	    		$responseData = "no";
	    		$card = "";
	    	}
    	}

		$response = array(
		          'status' => $status,
		          'msg' => $responseData,
		          'card' => $card,
		      );
      	return response()->json($response);
    }
}
