<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikesController extends Controller
{
    public function store(Request $request, Post $post){
        if ($post->likedBy($request->user())){
            $request->user()->likes()->where('post_id',$post->id)->delete();
            return redirect()->back();
        }

        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        return redirect()->back();

    }
}
