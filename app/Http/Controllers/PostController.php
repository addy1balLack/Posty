<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'post' => 'required',
            'photo' => 'image|max:1999'
        ]);

        if ($request->hasFile('photo')){

        }

        auth()->user()->posts()->create([
            'post' => $request->post,
            'photo' => $this->savePhoto($request)
        ]);

        return redirect()->back()->with('success','Post Created');
    }

    public function update(Request $request, Post $post){

    }

    private function savePhoto(Request $request){


        if ($request->hasFile('photo')){
            $destination_path = 'public/posts';
            $photo = $request->file('photo');

            $photo_ext = $photo->getClientOriginalExtension();
            $photo_name = Str::random(20) . '.'.$photo_ext;

            Storage::putFileAs($destination_path,$photo,$photo_name);
            return $photo_name;
        }

        return null;
    }

    public function destroy(Post $post){

    }
}
