<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Shop;
use App\Promotion;
use Carbon\Carbon;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = DB::table('shops')->where('username', Auth::user()->username )->get();
        // dd(count($shop));
        if(count($shop)>0){
            return redirect('/shop/show');
        }
        return view('shops.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $packages = [
            "sliver" => "Sliver",
            "gold" => "Gold"
        ];
        if($id == "1"){
            // var_dump('1');
            return view('shops.create',['package'=> "sliver" , 'packages' => $packages]);
        }
        else if($id == "2"){
            // var_dump('2');
            return view('shops.create',['package'=> "gold" , 'packages' => $packages]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $imageName = 'default.jpg';
        $username = request()->username;
        if(request()->image != null){
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            ]);
            $type = request()->type;
            $file = request()->file('image');
            $imageName = $username."_".time().'.'.request()->image->getClientOriginalExtension();
            $path = public_path('img/shops/logo');
            $file->move($path, $imageName);
        }

            request()->validate([
              'name' => 'required|string|max:255|unique:shops,name',
              'email' => 'required|string|email|max:255|unique:users',
              'phone' => 'required|numeric',
              'url' => 'required|unique:shops,url'
            ]);

        Shop::create(
            ['username' => $username,
            'name' => request()->name,
            'description' => request()->desc,
            'logo' => $imageName,
            'imgCover' => "defaultCover.png",
            'time' => request()->timeOpen.','.request()->timeClose,
            'type' => request()->type,
            'latlng' => request()->lat.','.request()->lng,
            'package' => request()->package,
            'phone' => $request->phone,
            'url' => $request->url,
            'email' => $request->email
        ]);

        $log = new LogController;
        $log->record($username,'Create new Shop as '.request()->name,'');

        return redirect(route('shop.show'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user()->username;
        $shop = DB::table('shops')->where('username',$user)->get()->first();
        $promotions = DB::table('promotions')->where([ ['shop_id',$shop->id], ['deleted_at', null] ])->get();
        // dd($shop);
        return view('shops.show' , ['shop' => $shop , 'promotions' => $promotions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function membercard(){
        $shop = DB::table('shops')->where('username',Auth::user()->username)->first();
        return view('shops.membercard',['shop'=>$shop]);
    }

    public function membercardCreate(Request $request){
        request()->validate([
            'name' => 'required',
            'desc' => 'required',
            'bahtperpoint' => 'required',
        ]);
        $keycard = str_random(10);
        if (request()->shop_package == "sliver"){
            $imageName = "defaultCard.png";
            $color1 = "#008df2";
            $color2 = "#5eb9fb";
        }else{
            $file = request()->file('imageBG');
            $imageName = request()->shop_id."_".time().'.'.request()->imageBG->getClientOriginalExtension();
            $path = public_path('img/cards');
            $file->move($path, $imageName);
            $color1 = request()->color1;
            $color2 = request()->color2;
        }
        DB::table('membercards')->insert(
            ['username' => Auth::user()->username,
            'shop_id' => request()->shop_id,
            'name' => request()->name,
            'description' => request()->desc,
            'imageBG' => $imageName,
            'colorHex1' => $color1,
            'colorHex2' => $color2,
            'bahtperpoint' => request()->bahtperpoint,
            'keycard' => $keycard,
            'created_at' => Carbon::now(),
        ]);

        $log = new LogController;
        $log->record(Auth::user()->username,'Create new member card, as '.request()->name,'');

        $shop = DB::table('shops')->where('username',Auth::user()->username)->first();
        return view('shops.membercard',['shop'=>$shop]);
    }
    public function membercardEdit($key){
        $card = DB::table('membercards')->where('keycard',$key)->first();
        $shop = DB::table('shops')->where('username',Auth::user()->username)->first();
        if (Auth::user()->username === $card->username){
            return view('shops.membercardEdit',['card'=>$card,'shop'=>$shop]);
        }
        return redirect('/not_permitted_to_execute_this_operation');
    }

    public function membercardUpdate(Request $request){
        request()->validate([
            'name' => 'required',
            'desc' => 'required',
            'bahtperpoint' => 'required',
        ]);
        $file = request()->file('imageBG');
        if ($file == ""){
            DB::table('membercards')
                        ->where('keycard',request()->keycard)
                        ->update(['name'=>request()->name,
                            'name'=>request()->name,
                            'description'=>request()->desc,
                            'colorHex1'=>request()->color1,
                            'colorHex1'=>request()->color2,
                            'bahtperpoint'=>request()->bahtperpoint,
                            'updated_at' => date('Y-m-d H:i:s')]);
        }else{
            $imageName = request()->keycard."_".time().'.'.request()->imageBG->getClientOriginalExtension();
            $path = public_path('img/cards');
            $file->move($path, $imageName);
            DB::table('membercards')
                        ->where('keycard',request()->keycard)
                        ->update(['name'=>request()->name,
                            'name'=>request()->name,
                            'description'=>request()->desc,
                            'colorHex1'=>request()->color1,
                            'colorHex1'=>request()->color2,
                            'imageBG'=>$imageName,
                            'bahtperpoint'=>request()->bahtperpoint,
                            'updated_at' => date('Y-m-d H:i:s')]);
        }

        // Logs
        $log = new LogController;
        $log->record(Auth::user()->username,'Updated member card infomation, as '.request()->name,'');


        $shop = DB::table('shops')->where('username',Auth::user()->username)->first();
        return redirect('/shop/membercard');
    }
    public function membercardPrint($key){
        $card = DB::table('membercards')->where('keycard',$key)->first();
        $shop = DB::table('shops')->where('username',Auth::user()->username)->first();
        if (Auth::user()->username === $card->username){
            return view('shops.membercardPrintOut',['card'=>$card,'shop'=>$shop]);
        }
        return redirect('/not_permitted_to_execute_this_operation');
    }

    public function membercardView($key){
        $card = DB::table('membercards')->where('keycard',$key)->first();
        $memberOfCard = DB::table('user_cards')->where('card_id',$card->id)->orderBy('id','desc')->get();
        return view('shops.membercardView',['card'=>$card,'memberOfCard'=>$memberOfCard]);
    }

    public function settingGen(){
        $shop = DB::table('shops')->where('username', Auth::user()->username)->first();
        $type = [
            "beauty" => 'Beauty',
            "clothes" => 'Clothes',
            'drink' => 'Drink',
            'food' => 'Food',
            'jewellery' => 'Jewellery',
            'service' => 'Service'
        ];

        return view('shops.setting', [ 'shop' => $shop , 'type' => $type ]);
    }


    public function showName($url){

        $shop = DB::table('shops')->where('url',$url)->get()->first();

        if($shop == null){
            return view('errors.pageNotF');
        }
        if($shop->username == Auth::user()->username){
            return $this->show();
        }
        // dd($user);
        $promotions = DB::table('promotions')->where([ ['shop_id',$shop->id], ['deleted_at', null] ])->get();
        $branches = DB::table('branches')->where([ ['shop_id',$shop->id], ['deleted_at', null] ])->get();
        $rewards = DB::table('vouchers')->where([ ['shop_id',$shop->id], ['status', 1] ])->get();
        $package = $shop->package;
        $count = count($branches);
        // dd(count($branches));

        //
        return view('shops.showUser' , ['shop' => $shop , 'url' => $url , 'promotions' => $promotions , 'branches' => $branches , 'count' => $count , 'package' => $package, 'rewards' => $rewards] );
    }

    public function reward(){
        $shop = DB::table('shops')->where('username',Auth::user()->username)->first();
        return view('shops.reward',['shop'=>$shop]);
    }

    public function updateGen(Request $request){
        // dd($request->all());
        $shop = DB::table('shops')->where('username' , Auth::user()->username )->update([

            'name' => request()->name,
            'description' => request()->desc,
            'time' => request()->timeOpen.','.request()->timeClose,
            'type' => request()->type,
            'latlng' => request()->lat.','.request()->lng,
            'status' => request()->status,
            'phone' => $request->phone,
            'url' => $request->url,
            'email' => $request->email
        ]);

        return redirect('/shop/setting');
    }

    public function settingTL(){
        $shop = DB::table('shops')->where('username', Auth::user()->username)->first();

        return view('shops.settingTL', [ 'shop' => $shop  ]);
    }

    public function updateTL(Request $request){
        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        $username = Auth::user()->username;
        if($request->type == "logo"){
            $file = request()->file('image');
            $imageName = $username."_".time().'.'.request()->image->getClientOriginalExtension();
            $path = public_path('img/shops/logo');
            $file->move($path, $imageName);

            $shop = DB::table('shops')->where('username' , Auth::user()->username )->update([


                'logo' => $imageName
            ]);

        }else if($request->type == "cover"){

            $file = request()->file('image');
            $imageName = $username."_".time().'.'.request()->image->getClientOriginalExtension();
            $path = public_path('img/shops/cover');
            $file->move($path, $imageName);

            $shop = DB::table('shops')->where('username' , Auth::user()->username )->update([


                'imgCover' => $imageName
            ]);
        }

        return redirect('/shop/setting/timeline');
    }



    public function updatePT(Request $request){
        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        $username = Auth::user()->username;
        $file = request()->file('image');
        $imageName = $username."_".time().'.'.request()->image->getClientOriginalExtension();
        $path = public_path('img/promotions/');
        $file->move($path, $imageName);
        $shop_id = DB::table('shops')->where('username' , Auth::user()->username)->first()->id;
        Promotion::create([
            'shop_id' => $shop_id ,
            'image' => $imageName ,
            'url' => "null"
            ]);

        return redirect('/shop/setting/promotion');
    }

    public function settingPT(){
        $shop = DB::table('shops')->where('username', Auth::user()->username)->first();
        $promotions = DB::table('promotions')->where([ ['shop_id',$shop->id], ['deleted_at', null] ])->get();
        return view('shops.settingPT' , [ 'shop' => $shop , 'promotions' => $promotions ]);
    }

    public function deletePT(Request $request){
        $promotion = Promotion::find($request->id);
        $promotion->delete();
        return redirect('/shop/setting/promotion');
    }
    public function rewardCreate(Request $request){
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'bePoint' => 'required',
            'voucherFormat' => 'required|unique:vouchers,voucherFormat',
            'image' => 'required|image',
        ]);
        $file = request()->file('image');
        $imageName = request()->shop."_".time().'.'.request()->image->getClientOriginalExtension();
        $path = public_path('img/rewards');
        $file->move($path, $imageName);

        //
        DB::table('vouchers')->insert(
            ['owner' => Auth::user()->username,
            'status' => 0,
            'name' => request()->name,
            'description' => request()->description,
            'image' => $imageName,
            'amount' => request()->amount,
            'bePoint' => request()->bePoint,
            'voucherFormat' => strtoupper(request()->voucherFormat),
            'reception' => 2,
            'shop_id' => request()->shop_id,
            'created_at' => Carbon::now(),
        ]);

        $log = new LogController;
        $log->record(Auth::user()->username,'Create new reward, as '.request()->name,'');
        return redirect('shop/reward');
    }

    public function iwant($code){
        $vouchers = DB::table('vouchers')->where('voucherFormat', $code)->get();
        $shop_id = $vouchers[0]->shop_id;
        $membercards = DB::table('membercards')->where('shop_id', $shop_id)->get();
        $card_id = $membercards[0]->id;
        $checkCardUser = DB::table('user_cards')->where('username', Auth::user()->username)->where('card_id',$card_id)->get();
        if ($shop_id == 5){
            if(Auth::user()->bePoint < $vouchers[0]->bePoint){
                // แต้มไม่พอ
                return view('user.novoucher');
            }else{
                $voucher_code = $code.date("Ymd").rand(0001, 9999);
                $log = new LogController;
                $log->record(Auth::user()->username,'Get reward '.$vouchers[0]->name.' , voucher code is '.$voucher_code,'');
                $log->recordBePoint(Auth::user()->username,'Get reward '.$vouchers[0]->name.' , voucher code is '.$voucher_code,$vouchers[0]->bePoint,1);
                DB::table('userVoucher')->insert(
                    ['voucher_id' => $vouchers[0]->id,
                    'shop_id' => $shop_id,
                    'status' => 0,
                    'username' => Auth::user()->username,
                    'voucher_code' => $voucher_code,
                    'created_at' => Carbon::now(),
                    'use_card_id' => 0,
                ]);
                $newamount = $vouchers[0]->amount -1;
                DB::table('vouchers')
                        ->where('id',$vouchers[0]->id)
                        ->update(['amount'=>$newamount]);
            }
        }else{
            if ($checkCardUser == "[]"){
                // ไม่มี card
                return redirect('home');
            }else{
                if($checkCardUser[0]->point < $vouchers[0]->bePoint){
                    // แต้มไม่พอ
                    return view('user.novoucher');
                }else{
                    // Voucher
                    $voucher_code = $code.date("Ymd").rand(0001, 9999);
                    DB::table('userVoucher')->insert(
                        ['voucher_id' => $vouchers[0]->id,
                        'shop_id' => $shop_id,
                        'status' => 0,
                        'username' => Auth::user()->username,
                        'voucher_code' => $voucher_code,
                        'created_at' => Carbon::now(),
                        'use_card_id' => $checkCardUser[0]->id,
                    ]);

                    //หักแต้มใน card
                    $newpoint = ($checkCardUser[0]->point - $vouchers[0]->bePoint);
                    $increase = DB::table('user_cards')->where('id' , $checkCardUser[0]->id)->update([
                        'point' => $newpoint,
                    ]);

                    // Log
                    $log = new LogController;
                    $log->record(Auth::user()->username,'Get reward '.$vouchers[0]->name.' , voucher code is '.$voucher_code,'');

                    // อัพเดทยอด
                    $newamount = $vouchers[0]->amount -1;
                    DB::table('vouchers')
                        ->where('id',$vouchers[0]->id)
                        ->update(['amount'=>$newamount]);
                }
            }
        }
        return redirect('user/voucher/'.$voucher_code);
    }
    public function rewardView($code){
        $voucher = DB::table('vouchers')->where('voucherFormat',$code)->first();
        $vouchers = DB::table('userVoucher')->where('voucher_id',$voucher->id)->get();
        return view('shops.vouchers',['vouchers'=>$vouchers]);
    }

    public function useVoucher($code){
        if(Auth::user()->role !== "Cashier"){
            return view('user.novoucher');
        }else{
            $voucher = DB::table('userVoucher')->where('voucher_code',$code)->get();
            if ($voucher == "[]"){
                return view('user.novoucher');
            }else{
                DB::table('userVoucher')
                        ->where('voucher_code',$code)
                        ->update(['updated_at'=>date('Y-m-d H:i:s'),
                            'status'=>1,
                            'cashier'=>Auth::user()->username,
                            ]);
                // Log
                $log = new LogController;
                $log->record(Auth::user()->username,'Give reward voucher code '.$code,'');
            }
        }
        return view('user.yesCode');
    }
    public function rewardEdit($code){
        $reward = DB::table('vouchers')->where('voucherFormat',$code)->first();
        if (Auth::user()->username === $reward->owner){
            return view('shops.rewardEdit',['reward'=>$reward]);
        }
        return redirect('/not_permitted_to_execute_this_operation');
    }
    public function rewardUpdate(Request $request){
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
            DB::table('vouchers')
                ->where('voucherFormat',request()->voucherFormat)
                ->update(['name'=>request()->name,
                    'status'=>request()->status,
                    'description'=>request()->description,
                    'amount'=>request()->amount,
                    'bePoint'=>request()->bePoint,
                    'updated_at' => date('Y-m-d H:i:s')]);
        // Logs
        $log = new LogController;
        $log->record(Auth::user()->username,'Updated reward, as '.request()->name,'');

        return redirect('shop/reward');
    }

    public function previewShop(){
        $shop = DB::table('shops')->where('username',Auth::user()->username)->get()->first();

        if($shop == null){
            return view('errors.pageNotF');
        }
        
        // dd($shop);
        $promotions = DB::table('promotions')->where([ ['shop_id',$shop->id], ['deleted_at', null] ])->get();
        $branches = DB::table('branches')->where([ ['shop_id',$shop->id], ['deleted_at', null] ])->get();
        $rewards = DB::table('vouchers')->where([ ['shop_id',$shop->id], ['status', 1] ])->get();
        $package = $shop->package;
        $count = count($branches);
        // dd(count($branches));
        return view('shops.showUser' , ['shop' => $shop , 'url' => $shop->url , 'promotions' => $promotions , 'branches' => $branches , 'count' => $count , 'package' => $package, 'rewards' => $rewards] );
    }
}
