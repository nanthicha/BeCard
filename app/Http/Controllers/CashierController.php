<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Shop;
use App\Cashier;



class CashierController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('cashier');
    // }
    public function toAdd()
    {
        if (Auth::user()->role != "Cashier"){
            return redirect('home');
        }else{
            $checkCashier = DB::table('cashiers')->where('username',Auth::user()->username)->first();
            if ($checkCashier == ""){
                return view('cashier.no');
            }else{
                $shop = DB::table('shops')->where('id',$checkCashier->shop_id)->get();
                $branch = DB::table('branches')->where('id',$checkCashier->branch_id)->first();
                return view('cashier.add',['shop'=>$shop,'branch'=>$branch]);
            }
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usr = Auth::user()->username;
        $username = request()->username;
        $name = request()->name;
        $password = str_random(10);
        $email = request()->email;
        $private = str_random(40);
        $remember = str_random(40);
        $phone = request()->phone;
        $shop_id = DB::table('shops')->where('username',"=",$usr)->first()->id;
        $branch_id = $request->branch;

        User::create([
            'username' => $username,
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'role' => 'Cashier',
            'private_key' => $private,
            'remember_token' => $remember,
            'phone' => $phone,
            'bePoint' => '0'
        ]);

        Cashier::create([
            'username' => $username,
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
            'shop_id' => $shop_id,
            'branch_id' => $branch_id
        ]);


        return redirect('/shop/cashier');

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
        $shops = DB::table('shops')->where('username',$user)->first();
        $shop_id = $shops->id;
        $package = $shops->package;
        // dd($shop_id);
        $branches = DB::table('branches')->where('username',$user)->get();
        $cashiers = DB::table('cashiers')->where('shop_id',$shop_id)->get();
        $imgCashiers = DB::table('users')->where('shop_id',$shop_id)->join('cashiers', 'users.username', '=', 'cashiers.username')
            ->select('users.username', 'users.image')
            ->get()->pluck('image','username');
        $countCashiers = DB::table('cashiers')->where('shop_id',$shop_id)
        ->select('branch_id' , DB::raw('COUNT(*) as count'))
        ->groupBy('branch_id')->get()->pluck('count','branch_id')->toArray();
        $count = DB::table('cashiers')->count();
       
        return view('cashier.show' , [  'branches' => $branches , 'cashiers' => $cashiers ,'imgCashiers' => $imgCashiers , 'countCashiers' => $countCashiers ,'package' => $package , 'count' => $count]);
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

    public function check()
    {
        if (Auth::user()->role != "Cashier"){
            return redirect('home');
        }else{

        }
    }
    public function yes(){
        return view('cashier.yes');
    }
    public function addData(Request $request){
        if (Auth::user()->role != "Cashier"){
            return redirect('home');
        }else{
            $validatedData = $request->validate([
                'nameBeCard' => 'required',
                'cardSelect' => 'required',
                'price' => 'required',
            ]);
            $cardid = $request->cardSelect;
            $user = DB::table('user_cards')
                ->where('username', $request->nameBeCard)
                ->where('card_id', $request->cardSelect)
                ->get();
            $card = DB::table('membercards')
                ->where('id', $request->cardSelect)
                ->get();
            $point = $user[0]->point;
            $baht = $card[0]->bahtperpoint;
            $addpoint = intval($request->price / $baht);
            $newpoint = $point + $addpoint;
            // update point in user_card
            $updateUserCard = DB::table('user_cards')
                ->where('username', $request->nameBeCard)
                ->where('card_id', $request->cardSelect)
                ->update(['point'=>$newpoint]);

            // Reddem Logs
            DB::table('redeems')->insert(
                ['username'=>$request->nameBeCard,
                'card_id'=>$request->cardSelect,
                'price'=>$request->price,
                'referance'=>$request->referance,
                'point'=>$addpoint,
                'cashier'=>Auth::user()->username,
            ]);
            // Log
            $log = new LogController;
            $log->record(Auth::user()->username,"Redeem $addpoint to card $cardid",$request->nameBeCard);
            $log->recordBePoint($request->nameBeCard,"Redeem on card",1,0);
            return view('cashier.yes');

        }
    }

    public function history(){
        $history = DB::table('redeems')
                ->where('cashier', Auth::user()->username)
                ->orderBy('id','desc')
                ->get();
        return view('cashier.history',['history'=>$history]);
    }
}
