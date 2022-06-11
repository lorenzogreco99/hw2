<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Likes;
use App\Models\Comments;

class CercaController extends Controller {

    public function index() {
        $session = session('username');
        $user = User::where('username', $session);
        if (!isset($session))
            return view('welcome');
        
        return view("cerca")->with("user", $user);
    }


    function serie($oggetto){
        $json = Http::get('https://api.tvmaze.com/search/shows', [
            'q' => $oggetto,
        ]);
        if ($json->failed()) abort(500);

        return $json;
        
    } 

    function musica($oggetto){
        $token = Http::asForm()->withHeaders([
            'Authorization' => 'Basic '.base64_encode(env('SPOTIFY_CLIENT_ID').':'.env('SPOTIFY_CLIENT_SECRET')),
        ])->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
        ]);
        if ($token->failed()) abort(500);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$token['access_token']
        ])->get('https://api.spotify.com/v1/search', [
            'type' => 'track',
            'q' => $oggetto
        ]);
        if($response->failed()) abort(500);

        return $response;
    }    

    function cibo($oggetto){
        $array = array();
        for($i = 0 ; $i<3 ; $i++){
            $json = Http::get('https://foodish-api.herokuapp.com/api/images/'.$oggetto);
            if ($json->failed()) abort(500);
            $array[]= array($i =>$json['image']);
        }
        return $array;

    }   
    
    
    public function cerca($type, $oggetto){
        switch($type) {
            case 'serie tv': return $this->serie($oggetto); break;
            case 'musica': return $this->musica($oggetto); break;
            case 'cibo': return $this->cibo($oggetto); break;
            default: break;
        }
    }
    
    public function download(){
        $request = request();
        $post = new Post;
        $post->username = session('username');
        $post->url = $request->foto;
        $post->save();
        return $post;
    }
}
?>