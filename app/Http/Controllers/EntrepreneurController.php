<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Mail;
use App\Mail\Reminder;

class EntrepreneurController extends Controller
{

      public function register(){
        return view('shops.register');
      }

      public function storeEntrepreneur(Request $request){

        request()->validate([
          'username' => 'required|unique:users,username',
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6|confirmed',
          'phone' => 'required|unique:users,phone|numeric'
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'Entrepreneur',
            'private_key' => str_random(40),
            'remember_token' => str_random(40),
            'phone' => $request->phone,
            'bePoint' => '0'
        ]);
          $this->sendMail($request->email,$request->username);
        return redirect('/');
      }

      public function sendMail($email,$card){
        // $mail = $email;
        // Mail::to($mail)->send(new Reminder);
        $data = [
            'card' => $card,        
            'email' => $email
        ];
        $sendMailStatus = Mail::send('mail.joinMembercard', ['data' => $data] , function ($message) use ($data) {
        $message->from('eventhubth@gmail.com', 'BeCard');
        $message->to($data['email'])->subject('BeCerd Verify Account');
        });
        // dd('mail send success');

    }
}
