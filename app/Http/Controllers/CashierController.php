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
        return view('cashier.add');
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
            'password' => $password,
            'role' => 'User',
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
        $shop_id = DB::table('shops')->where('username',$user)->first()->id;
        // dd($shop_id);
        $branches = DB::table('branches')->where('username',$user)->get();
        $cashiers = DB::table('cashiers')->where('shop_id',$shop_id)->get();
        $imgCashiers = DB::table('users')->join('cashiers', 'users.username', '=', 'cashiers.username')
            ->select('users.username', 'users.image')
            ->get()->pluck('image','username');
        
        // dd($imgCashiers);
        return view('cashier.show' , [  'branches' => $branches , 'cashiers' => $cashiers ,'imgCashiers' => $imgCashiers]);
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
}
