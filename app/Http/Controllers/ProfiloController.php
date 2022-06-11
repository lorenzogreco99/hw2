<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Likes;
use App\Models\Comments;

class ProfiloController extends Controller {

    public function index() {
        $session_id = session('username');
        $user = User::find($session_id);
        if (!isset($session_id))
            return view('welcome');
        
        return view("profilo")->with("user", $user);
    }
    
    public function fetch_foto(){
        $foto = Post:: where('username', session('username'))->get();
        return $foto;
    }
}
?>