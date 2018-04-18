<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Shop;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user()->username;
        $listShops = DB::table('shops')->where('username',$user)->get();
        return view('shops.create',['shops'=>$listShops]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        $type = request()->type;
        $file = request()->file('image');
        $username = request()->username;
        $imageName = $username."_".time().'.'.request()->image->getClientOriginalExtension();
        $path = public_path('img/shops/logo');
        $file->move($path, $imageName);

        Shop::create(
            ['username' => $username,
            'name' => request()->name,
            'description' => request()->desc,
            'logo' => $imageName,
            'imgCover' => "defaultCover.png",
            'time' => request()->timeOpen.','.request()->timeClose,
            'type' => request()->type,
            'latlng' => request()->lat.','.request()->lng,
            'package' => "sliver",
        ]);

        $log = new LogController;
        $log->record($username,'Create new Shop as '.request()->name,'');

        return redirect(route('shop.create'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
