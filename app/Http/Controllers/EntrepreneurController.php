<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class EntrepreneurController extends Controller
{

      public function register(){
        return view('shops.register');
      }

      public function storeEntrepreneur(Request $request){
        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'Entrepreneur',
            'private_key' => str_random(40),
            'remember_token' => str_random(40),
            'phone' => $request->telephone,
            'bePoint' => '0'
        ]);

        return redirect('/');
      }
}
