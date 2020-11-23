<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $userPost = null;

        if (auth()->check()){
            $userPost = auth()->user()->posts->sortDesc()->first();
        }
        $posts = Post::orderBy('created_at','desc')->get();
        return view('home')->with('posts', $posts)->with('recent_post', $userPost);
    }
}
