<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

class PostLikeController extends Controller
{
  public function __construct()
  {
    $this->middleware(['auth']);
  }



  public function store(Request $request, Post $post)
  {
    $post->likes()->create([
      'user_id' => $request->user()->id,
    ]);
    return back();
  }


  public function destroy(Request $request, Post $post)
  {
    $request->user()->likes()->where('post_id', $post->id)->delete();
    return back();
  }
}
