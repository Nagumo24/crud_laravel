<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Models\Lists;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        return view('lists.index', [
            'list' => new Lists,
            'lists' => Lists::orderBy('id', 'desc')->get()
        ]);
    }

    public function store(ListsRequest $request){ // store ini akan mengirim ke database   

        $uuid = strtolower(Str::random(32));
        Lists::create([
            'uuid' => $uuid,
            'username' => $request->username,
        ]);

        return back()->with('success', 'Data Berhasil Dikirim.');
    }

    public function edit(Lists $list)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        // $edit = DB::table('posts')->where($id)->get();
        // // passing data pegawai yang didapat ke view edit.blade.php
        // return view('edit',['content' => $editP]);

        return view('lists.edit',[
            
            'lists' => $lists
            
        ]);
    
    }

    public function update(Request $request, $id){

        Lists::find($id)->update([
        
            'username' => $request->username,
            'title' => $request->title,
            'list' => $request->list
            
            
        ]);

        return redirect('list');
    }
    public function destroy($id){

        Lists::find($id)->delete();

        return back();
    }
}

