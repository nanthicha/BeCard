<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function users(Request $request)
    {
    	$numberOfPaginate = 15;
		$sort = $request->input('sort', 'asc');
		if ($sort != "asc"){
			$users = DB::table('users')->orderBy($sort, 'asc')->paginate($numberOfPaginate);
		}
		else{
			$users = DB::table('users')->orderBy('id', 'asc')->paginate($numberOfPaginate);
		}
        return view('admin.users', ['users' => $users]);
    }

    public function userEdit($id){
        $userEditInfo = DB::table('users')->where('username',$id)->first();
        return view('admin.edit', ['userEdit' => $userEditInfo]);
    }
}
