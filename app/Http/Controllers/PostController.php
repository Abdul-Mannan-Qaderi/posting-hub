<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Post;


class PostController extends Controller
{

        public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index() {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request) {
        $request->validate([
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));
        return back();
    }   
}  
