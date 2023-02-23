@extends('layouts.app')

@section('content')
    <h1>POST</h1>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{  session()->get('success') }}
        </div>
    @endif
    <form action="/task/{{ $task $id }}" method="post">
        @csrf
        @method('put')
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" id="username" value="{{ $task->username }}" class="@error('username') is-invalid @enderror" required></td>
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </tr>

            <tr>
                <td>Task</td>
                <td><input type="text" name="task" id="task" value="{{ $task->task }}" class="@error('task') is-invalid @enderror" required></td>
                @error('task')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </tr>
            
            <tr>
                <td><button type="submit">Send</button></td>
            </tr>
        </table>

        <br>
        <br>
        

                    

            <table class="table table-dark table-hover">
                <tr>
                    <td>No</td>
                    <td>Username</td>
                    <td>Task</td>
                </tr>
                @foreach ( $tasks as $index => $task)
                <tr>
                    <td>{{  $index + 1 }}</td>
                    <td>{{ $task->username }}</td>
                    <td>{{ $task->task }}</td>
                </tr>    
                @endforeach
            </table>

                    
                        
                        
        
        
      
    </form>

@endsection 

