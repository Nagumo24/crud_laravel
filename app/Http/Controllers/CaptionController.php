<?php

namespace App\Http\Controllers;

use App\Http\Requests\CaptionRequest;
use App\Models\Caption;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CaptionController extends Controller
{
    public function index(){

        return view('captions.index', [
            'caption' => new Caption,
            'captions' => Caption::orderBy('id', 'desc')->get()
        ]);
    }

    public function store(CaptionRequest $request){ // store ini akan mengirim ke database   

        Caption::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return back()->with('success', 'Data Berhasil Dikirim.');
    }

    public function edit(Caption $caption)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        // $edit = DB::table('Captions')->where($id)->get();
        // // passing data pegawai yang didapat ke view edit.blade.php
        // return view('edit',['content' => $editP]);

        return view('captions.edit',[
            
            'caption' => $caption
            
        ]);
    
    }

    public function update(Request $request, $id){

        Caption::find($id)->update([

            'title' => $request->title,
        
            'content' => $request->content
            
            
        ]);

        return redirect('caption');
    }
    public function destroy($id){

        Caption::find($id)->delete();

        return back();
    }
}

