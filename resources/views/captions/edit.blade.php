@extends('layouts.app')

@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{  session()->get('success') }}
        </div>
    @endif
    <h1>POST</h1>
    <form action="{{ route('caption.update',$caption->id)  }}" method="post">  
        @method('PUT')
        @csrf
        <label for="title">title</label>
        <input type="text" name="title"  value="{{ old('title', $caption->title) }}" class="@error('title') is-invalid @enderror" required>
        @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <label for="content">caption</label>
        <input type="text" name="content"  value="{{ old('content', $caption->content) }}" class="@error('content') is-invalid @enderror" required>
        @error('content')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <button type="submit">Tambah</button>>
    </form>

    <br>
    <br>

                    
    {{-- <td></td>
    <table class="table table-dark table-hover">
        <tr>
            <td>No</td>
            <td>Post</td>

        </tr>
        @foreach ( $posts as $index => $post)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $post->content }}</td>
        </tr>    
        @endforeach
    </table> --}}

                    
                        
                        

@endsection 

