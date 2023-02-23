@extends('layouts.app')

@section('content')
    <h1>POST</h1>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{  session()->get('success') }}
        </div>
    @endif
    <form action="{{ route('task.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" id="username" class="@error('username') is-invalid @enderror" required></td>
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </tr>

            <tr>
                <td>Task</td>
                <td><input type="text" name="task" id="task" class="@error('task') is-invalid @enderror" required></td>
                @error('task')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </tr>
            
            <tr>
                <td><button type="submit">Send</button></td>
            </tr>
        </table>
    </form>
        <br>
        <br>
        

                    

            <table class="table table-dark table-hover float-right">
                <tr>
                    <td>No</td>
                    <td>Username</td>
                    <td>Task</td>
                    <td>Aksi</td>
                    <td>put</td>
                </tr>
                @foreach ( $tasks as $index => $task)
                <tr>
                    <td>{{  $index + 1 }}</td>
                    <td>{{ $task->username }}</td>
                    <td>{{ $task->task }}</td>
                    <td>
                        <div class="d-flex float-right">
                            <a class="btn btn-success" href="{{ route('task.edit', $task->id) }}">Edit</a>

                            <form action="{{ route('task.destroy', $task->id) }}" method="post">
                                @csrf
                                @method("delete")
                                 <td><button class="btn btn-danger" type="submit">Hapus</button></td>
                            </form>
                        </div>
                    </td>
                    

                </tr>    
                @endforeach
            </table>

                    
                        
                        
        
        
      
    

@endsection 

