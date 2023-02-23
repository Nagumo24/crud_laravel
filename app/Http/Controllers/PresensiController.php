<?php

namespace App\Http\Controllers;

use App\Http\Requests\PresensiRequest;
use App\Models\Presensi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index(){

        return view('presensis.index', [
            'presensi' => new Presensi,
            'presensis' => Presensi::orderBy('id', 'desc')->get()
        ]);
    }

    public function store(PresensiRequest $request){ // store ini akan mengirim ke database   

        $uuid = strtolower(Str::random(32));
        Presensi::create([
            'uuid' => $uuid,
            'nama' => $request->nama,
            'jam_masuk' => $request->jam_masuk,
            'lokasi_masuk' => $request->lokasi_masuk
        ]);

        return back()->with('success', 'Data Berhasil Dikirim.');
    }

    public function edit(Presensi $presensi)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        // $edit = DB::table('posts')->where($id)->get();
        // // passing data pegawai yang didapat ke view edit.blade.php
        // return view('edit',['content' => $editP]);

        return view('presensis.edit',[
            
            'presensi' => $presensi
            
        ]);
    
    }

    public function update(Request $request, $id){

        Presensi::find($id)->update([
        
            'nama' => $request->nama,
            'jam_masuk' => $request->jam_masuk,
            'lokasi_masuk' => $request->lokasi_masuk    
        ]);

        return redirect('presensi');
    }
    public function destroy($id){

        Presensi::find($id)->delete();

        return back();
    }
}

