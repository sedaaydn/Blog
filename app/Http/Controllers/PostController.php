<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $posts = Post::all();
        $postCount = $posts->count();
        return view('posts.index',compact('posts'),compact('user'))->with('postCount',$postCount);
    }

    public function create()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('posts.create',compact('user'));
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id; //giriş yapan kullanıcı id si
        $user = User::find($user_id); //giriş yapmış kullanıcıyı user tablosundan buluyor
        $user->posts()->create($request->all()); //posts fonksiyonu sayesinde gelen ilgileri post tablosuna kaydediyor
        $postCount = $user->posts->count();
        toastr()->success('Post saved successfully', 'Successful !');
        return view('user.user_posts',compact('user'))->with('postCount',$postCount);
    }


    public function show(Post $post)
    {
        //
    }


    public function edit($id)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $post=Post::find($id); // düzenlenecek postu post değişkenine atadık.
        return view('posts.edit',compact('post'))->with('user',$user);
    }


    public function update(Request $request,$id)
    {
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();
        toastr()->success('Post successfully edited', 'Successful !');
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('user.user_posts',compact('user'));
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->comments()->delete();
        $post->delete();
        toastr()->success('Post successfully deleted', 'Successful !');
        return back();
    }
}
