<?php

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comments;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{

    public function upload() {
        $request = request();
        $post = Post::where('url', $request->url)->get();
        $comment = new Comments;
        $comment->username = session('username');
        $comment->post = $post[0]->id;
        $comment->text = $request->commento;
        $comment->save();
        return $comment;
    }

    
    public function fetch_comments() {
        $request = request();
        $post = Post::where('url', $request->foto)->get();
        $comments = Comments::where('post', $post[0]->id)->get();
        return $comments;
        
    }
        

}
