<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {

    }
    public function commentStore(Request $request,$id)
    {
        $post=Post::find($id);
        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'comment' => $request->input('comment')
        ]);
        toastr()->success('Comment saved successfully', 'Successful !');
        return back();
    }


    public function show(Comment $comment)
    {
        //
    }


    public function edit(Comment $comment)
    {
        //
    }

    public function update(Request $request,$comment)
    {
        //
    }


    public function destroy($id)
    {
        $comment=Comment::find($id);
        $comment->delete();
        toastr()->success('Comment successfully deleted', 'Successful !');
        return back();
    }
}
