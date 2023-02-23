<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        return view('tasks.index', [
            'task' => new Task,
            'tasks' => Task::orderBy('id', 'desc')->get()
        ]);
    }

    public function store(TaskRequest $request){

        $uuid = strtolower(Str::random(32));
        Task::create([
            'uuid' => $uuid,
            'username' => $request->username,
            'task' => $request->task,

        ]);

        return back()->with('success', 'Data anda berhasil');
    }

    // public function edit($id){

    //     $task = DB::table{'tasks'}->where('id', $id)->first();

    //     return view('task.edit', ['task' => $task]);
    // }

    public function edit(Task $task)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        // $edit = DB::table('posts')->where($id)->get();
        // // passing data pegawai yang didapat ke view edit.blade.php
        // return view('edit',['content' => $editP]);

        return view('tasks.edit',[
            
            'task' => $task,
            
        ]);
    
    }

    public function update(Request $request, $id){

        Task::find($id)->update([
            'username' => $request->username,
            'task' => $request->task
            
            
        ]);

        return redirect('task');
    }

    public function destroy($id){

        Task::find($id)->delete();

        return back();
    }
}

