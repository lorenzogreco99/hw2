<?php

use Illuminate\Routing\Controller;
use App\Models\Post;
use App\Models\Likes;
use App\Models\User;


class FeedController extends Controller {
    public function feed() {

        $posts = Post::all();
        return $posts;
    
    }

    public function fetchlike($id){
        
        $posts = Likes:: where('post', $id)->where('username', session('username'))->get();
        if(count($posts)!==0){
            return $id;
        }else{
            return 0;
        }

    }

    public function fetch_email(){
        $email = User::all();
        return $email;
    }

}
?>