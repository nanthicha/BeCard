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

    public function register(){
      return view('shops.register');
    }

    public function sendmail(){
      return view('shops.show');
    }

    public function showName($url){

        $shop = DB::table('shops')->where('url',$url)->get()->first();
        $promotions = DB::table('promotions')->where([ ['shop_id',$shop->id], ['deleted_at', null] ])->get();
        if($shop == null){
            return view('errors.pageNotF');
        }
        if($shop->username == Auth::user()->username){
            return $this->show();
        }
        // dd($user);
        return view('shops.showUser' , ['shop' => $shop , 'url' => $url , 'promotions' => $promotions] );
    }

    public function reward(){
        return view('shops.reward');
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

    public function deletePT($id){
        $promotion = Promotion::find($id);
        $promotion->delete();
        return redirect('/shop/setting/promotion');
    }


}
