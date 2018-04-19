<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Shop;



class CashierController extends Controller
{
    public function __construct()
    {
        $this->middleware('cashier');
    }
    public function toAdd()
    {
        return view('cashier.add');
    }
}
