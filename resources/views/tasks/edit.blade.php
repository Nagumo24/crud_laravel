@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <h1>tasks</h1>
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{  session()->get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('task.update', $task->id) }}" method="post"> 
                        @method('PUT')
                        @csrf
                        <table class="table">
                            <tr>
                                <td>Username</td>
                                <td><input type="text" name="username" value="{{ old('username', $task->username) }}" class="@error('username') is-invalid @enderror" required></td>
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </tr>

                            <tr>
                                <td>Task</td>
                                <td><textarea type="text" name="task"  class="@error('task') is-invalid @enderror" required>{{ old('task', $task->task) }}</textarea></td>
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
                    

                      {{-- <table class="table table-dark table-hover">

                        <tr>
                            <td>No</td>
                            <td>Title</td>
                            <td>Content</td>
                        </tr>
                        @foreach ( $blogs as $index => $blog)

                        
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->content }}</td>

                        </tr>
                        @endforeach
                        
                      </table> --}}

                    
                        
                        
                    

                    
                </div>
            </div>
        </div>
    </div>

    

@endsection 

