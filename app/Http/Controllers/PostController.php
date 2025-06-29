<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    public function index() {
        $posts = Post::with('user', 'likes')->latest()->paginate(3);
        return view('posts.index', compact('posts'));
    }


    public function show(Post $post) {
        return view('posts.show', ['post' => $post]);
    }

    public function store(Request $request) {
        $request->validate([
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));
        return back();
    }   

    public function destroy(Post $post) {

        if(!$post->ownedBy(auth()->user())){
            dd('you cannot delete!');
        }

        $post->delete();
        return back();
    }
}  
