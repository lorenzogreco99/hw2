<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller {

    public function create()
    {
        $request = request();
        $error = array();
        
        #Verifica dati inseriti
        # USERNAME
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $request['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = User::where('username', $request['username'])->first();
            if ($username !== null) {
                $error[] = "Username già utilizzato";
            }
        }
        # PASSWORD
        if (strlen($request["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        } 
        # CONFERMA PASSWORD
        if (strcmp($request["password"], $request["password_conf"]) != 0) {
            $error[] = "Le password non coincidono";
        }
        # EMAIL
        if (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = User::where('email', $request['email'])->first();
            if ($email !== null) {
                $error[] = "Email già utilizzata";
            }
        }

        if(count($error) === 0) {
            $newUser =  User::create([
            'username' => $request['username'],
            'password' => $request['password'],
            'nome' => $request['name'],
            'cognome' => $request['surname'],
            'email' => $request['email'],
            ]);
            if($newUser) {
                Session::put('username', $newUser->username);
                Session::put('nome', $newUser->nome);
                Session::put('cognome', $newUser->cognome);
                Session::put('email', $newUser->email);
                return redirect('home');
            } 
            else {
                return redirect('register')->withInput();
            }
        }
        else 
            return redirect('register')->withInput();  
    }


    public function checkUsername($query) {
        $exist = User::where('username', $query)->exists();
        return ['exists' => $exist];
    }

    public function checkEmail($query) {
        $exist = User::where('email', $query)->exists();
        return ['exists' => $exist];
    }

    public function index() {
        if(session('username') !== null) {
            return redirect("home");
        }
        else {
            return view('registrati');
        }
    } 

}
?>