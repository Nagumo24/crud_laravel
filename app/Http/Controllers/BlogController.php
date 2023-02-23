<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return view('blogs.index', [
            'blog' => new Blog,
            'blogs' => Blog::orderBy('id', 'desc')->get()
        ]);
    }

    public function store(BlogRequest $request){

        $uuid = strtolower(Str::random(32));

        Blog::create([
            'uuid' => $uuid,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        

        // DB::table('blogs')->insert([
        //     'uuid' => $uuid,
        //     'title' => $request->title,
        //     'content' => $request->content,
        // ]);

        return back()->with('success', 'Data Berhasil Dikirim.');
    }
    // public function edit($id){

    //     'blogs' => Blog::table('blogs')->where('id', $id)=>first();

    //     return view('blogs.edit', ['blog' => $blog]);
    // }

    public function edit(Blog $blog)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        // $edit = DB::table('posts')->where($id)->get();
        // // passing data pegawai yang didapat ke view edit.blade.php
        // return view('edit',['content' => $editP]);

        return view('blogs.edit',[
            
            'blog' => $blog
            
        ]);
    
    }

    public function update(Request $request, $id){

        Blog::find($id)->update([
            'title' => $request->title,
            'content' => $request->content
            
            
        ]);

        return redirect('blog');
    }

    public function destroy($id){

        Blog::find($id)->delete();

        return back();
    }
}


