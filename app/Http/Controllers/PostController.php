<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        return view('posts.index', [
            'post' => new Post,
            'posts' => Post::orderBy('id', 'desc')->get()
        ]);
    }

    public function store(PostRequest $request){ // store ini akan mengirim ke database   

        $uuid = strtolower(Str::random(32));
        Post::create([
            'uuid' => $uuid,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Data Berhasil Dikirim.');
    }

    public function edit(Post $post)
    {
        

        return view('posts.edit',[
            
            'post' => $post
            
        ]);
    
    }

    public function update(Request $request, $id){

        Post::find($id)->update([
        
            'content' => $request->content
            
            
        ]);

        return redirect('post');
    }
    public function destroy($id){

        Post::find($id)->delete();

        return back();
    }
}

