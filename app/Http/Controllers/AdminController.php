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

    public function usersLogs()
    {
        $log = DB::table('user_logs')->orderBy('id', 'desc')->paginate(15);
        return view('admin.userslogs', ['logs' => $log]);
    }

    public function usersLogsName($name)
    {
        $log = DB::table('user_logs')->where('username',$name)->orWhere('assigned_to',$name)->orderBy('id', 'desc')->paginate(15);
        return view('admin.userslogs', ['logs' => $log,'name'=>$name]);
    }

    public function userEdit($id){
        $userEditInfo = DB::table('users')->where('username',$id)->first();
        return view('admin.edit', ['userEdit' => $userEditInfo]);
    }

    public function affiliates(Request $request)
    {
        $numberOfPaginate = 15;
        $sort = $request->input('sort', 'desc');
        if ($sort != "desc"){
            $affiliates = DB::table('affiliates')->orderBy($sort, 'desc')->paginate($numberOfPaginate);
        }
        else{
            $affiliates = DB::table('affiliates')->orderBy('id', 'desc')->paginate($numberOfPaginate);
        }
        return view('admin.affiliates', ['users' => $affiliates]);
    }
}
