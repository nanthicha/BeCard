<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MyController extends Controller
{
    public function index()
    {
        $userName = Auth::user()->name;
        $role = DB::table('users')->where('name',$userName)->value('email');
        $data = array(
            'title'=>'My App',
            'username'=>$userName,
            'email'=>$role
        );
        return view('home.index')->withTitle('Laravel Magic method.');
    }
    public function create()
    {
        echo 'create';
    }
    public function store(Request $request)
    {
        echo 'store';
    }
    public function show($id)
    {
        echo 'show';
    }
    public function edit($id)
    {
        echo 'edit';
    }
    public function update(Request $request, $id)
    {
        echo 'update';
    }
    public function destroy($id)
    {
        echo 'destroy';
    }

    public function regisAffiliate($id){
        $id = \App\User::where('private_key',$id)->first()->username;
        return view('auth.registerAffi', ['code' => $id]);
    }
}
