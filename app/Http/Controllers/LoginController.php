<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller {

    public function login() {
        if(session('username') !== null) {
            return redirect("home");
        }
        else {
            return view('login')
            ->with('csrf_token', csrf_token());
        }
     }

     public function checkLogin() {
         $user = User::where('email', request('email'))->where('password', request('password'))->first();

         if($user !== null) {
             Session::put('username', $user->username);
             Session::put('user_id', $user->id);
             Session::put('nome', $user->nome);
             Session::put('cognome', $user->cognome);
             Session::put('email', $user->email);
             return redirect('home');
         }
         else {
             return redirect('login')->with('status', 'Dati non corretti');
         }
     }

     public function logout() {
         Session::flush();
         return redirect('login');
     }
}
?>