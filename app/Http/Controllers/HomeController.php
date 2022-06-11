<?php

use Illuminate\Routing\Controller;
use App\Models\User;

class HomeController extends Controller {

    public function index() {
        $session_id = session('username');
        $user = User::where('username', $session_id)->get();
        if (!isset($session_id))
            return view('welcome');
        
        return view("home")->with("user", $user);
    }
}
?>