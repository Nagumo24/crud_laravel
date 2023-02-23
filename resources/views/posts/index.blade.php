@extends('layouts.app')

@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{  session()->get('success') }}
        </div>
    @endif
    <h1>POST</h1>
    <form action="{{ route('post.store') }}" method="post">
        @csrf
        <label for="content">Post</label>
        <input type="text" name="content" id="content" class="@error('content') is-invalid @enderror" required>
        @error('content')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <button type="submit">Tambah</button>
    </form>
    
    <br>
    <br>

                    
    <td></td>
    <table class="table table-dark table-hover">
        <tr>
            <td>No</td>
            <td>Post</td>
            <td>aksi</td>

        </tr>
        @foreach ( $posts as $index => $post)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $post->content }}</td>
            <td>
                        <div class="d-flex">
                            <td><a class="btn btn-success" href="{{ route('post.edit', $post->id) }}">Edit</a></td>

                            <form action="{{ route('post.destroy', $post->id) }}" method="post">
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

