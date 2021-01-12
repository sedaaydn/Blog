<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $post = $user->posts;
        $user_post = $post->count(); //giriş yapan kullanıcının post sayısı

        $posts = Post::all();
        $post_count = $posts->count(); //toplam post sayısı

        //post için 0 a bölünme kontrolü
        if($user_post == 0)
            $post_orani = 0;
        else
            $post_orani = ($user_post / $post_count)*100;

        $comments = Comment::all();
        $all_comment = $comments->count(); //toplam yorum sayısı

        $comment = $user->comments;
        $user_comment = $comment->count(); //giriş yapan kullanıcının yorum sayısı

        if($user_comment == 0)
        {
            $yorum_oran = 0;
        }
        else
        {
            $yorum_oran =  ($user_comment/ $all_comment)*100;
        }
        return view('home')->with('post_count',$post_count)->with('post_orani',$post_orani)->with('yorum_oran',$yorum_oran)->with('user',$user);
    }
    public function tr(){
        App::setlocale('tr');
        return back();
    }
    public function ing(){
        App::setlocale('en');
        return back();
    }

}
