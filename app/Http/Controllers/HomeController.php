<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Shop;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == "Cashier"){
            return redirect(route('cashier.add'));
        }
        $membercard = DB::table('membercards')->get();
        $shop_url = DB::table('shops')->get()->pluck('url','id');
        return view('home',['membercard'=>$membercard , 'shop_url' => $shop_url]);
    }
}
