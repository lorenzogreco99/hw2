<?php

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Likes;
use App\Models\Comments;

class LikeController extends Controller
{
    public function fetch_like() {
        $request = request();
        $post = Post::where('url', $request->foto)->get();
        return $post[0]->nlikes;
    }

    public function unlike() {
        $request = request();
        $post_id = Post::where('url', $request->foto)->get();
        $likes = Likes::where('username', session('username'))->where('post', $post_id[0]->id)->delete();;
        return 1;
    }
    public function like() {
        $request = request();
        $post_id = Post::where('url', $request->foto)->get();
        $post_like = new Likes;
        $post_like->username = session('username');
        $post_like->post = $post_id[0]->id;
        $post_like->save();
        return $post_like;
    }
}
