<?php

namespace App\Http\Controllers;
 
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NewsController extends Controller
{
        public function index(){

            return view('newss.index', [
                'news' => new News,
                'newss' => News::orderBy('id', 'desc')->get()
            ]);
        }

        public function store(NewsRequest $request){ // store ini akan mengirim ke database   

           
            News::create([
                'title' => $request->title,
                'paragraf' => $request->paragraf,
                'image' => $request->image
            ]);

            return back()->with('success', 'Data Berhasil Dikirim.');
        }

        public function edit(News $news)
        {
            

            return view('newss.edit',[
                
                'news' => $news
                
            ]);
        
        }

        public function update(Request $request, $id){

            News::find($id)->update([
            
                'title' => $request->title,
                'paragraf' => $request->paragraf,
                'image' => $image_path
            ]);

            return redirect('news');
        }
        public function destroy($id){

            News::find($id)->delete();

            return back();
        }
    }