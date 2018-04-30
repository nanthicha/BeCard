<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
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
        $rewards = DB::table('vouchers')->where('vouchers.shop_id','5')->where('vouchers.status','1')->orderBy('bePoint','desc')->join('shops', 'vouchers.shop_id', '=', 'shops.id')->select('vouchers.*','shops.name as shopname','shops.logo')->paginate($numberOfPaginate);
        $bepointlog = DB::table('bepoint_logs')->where('username',Auth::user()->username)->orderBy('id','desc')->get();
        return view('reward', ['users' => $rewards,'bepointlog'=>$bepointlog]);
    }
    public function voucher(){
        $numberOfPaginate = 15;
        $vouchers = DB::table('userVoucher')->where('username',Auth::user()->username)->paginate($numberOfPaginate);
        return view('vouchers', ['vouchers' => $vouchers]);
    }
    public function affiliate(){
        $userName = Auth::user()->username;
        return view('affiliate', ['name' => $userName]);
    }

    public function updateProfile(){
        request()->validate([
            'phone' => 'required|unique:users,phone',
        ]);
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

    public function joinCard($key){
        $card = DB::table('membercards')->where('keycard',$key)->first();
        if ($card === null){
            return redirect('home')->with('message','Dont have this shop,please check you QR code agian.');
        }
        $checkcard = DB::table('user_cards')->where('card_id',$card->id)->where('username',Auth::user()->username)->first();
        $allmembercard = DB::table('membercards')
        ->where('shop_id',$card->shop_id)
        ->where('user_cards.username',Auth::user()->username)
        ->join('user_cards', 'user_cards.card_id', '=', 'membercards.id')
        ->select('membercards.id','user_cards.card_id')
        ->get();
        if ($checkcard !== null or $allmembercard != "[]"){
            return view('user.cardalready');
        }else{
            DB::table('user_cards')->insert(
                ['username' => Auth::user()->username,
                'card_id' => $card->id,
                'point' => 0,
                'created_at' => Carbon::now(),
            ]);
            $log = new LogController;
            $log->record(Auth::user()->username,'Register new card :'.$card->name,'');
            $log->recordBePoint(Auth::user()->username,"Register new card :".$card->name,10,0);
        }
        return view('user.cardyes',['cardname'=>$card->name]);
    }

    public function showVoucherID($id){
        $voucher = DB::table('userVoucher')->where('voucher_code',$id)->first();
        if ($voucher == ""){
            return redirect('home');
        }
        $shop = DB::table('shops')->where('id',$voucher->shop_id)->first();
        $vouchers = DB::table('vouchers')->where('id',$voucher->voucher_id)->first();
        return view('user.voucher',['voucher'=>$voucher,'shop'=>$shop,'vouchers'=>$vouchers]);
    }

    public function verifyAccount($username){
        DB::table('users')->where('username' , $username)->update([
            'status' => 'verify'
        ]);
        return view('foundations.successVerify');
    }

}
