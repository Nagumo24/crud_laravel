@extends('layouts.app')

@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{  session()->get('success') }}
        </div>
    @endif
    <h1>POST</h1>
    <form action="{{ route('post.update',$post->id)  }}" method="post">  
        @method('PUT')
        @csrf
        <label for="content">Post</label>
        <input type="text" name="content" value="{{ old('content', $post->content) }}" class="@error('content') is-invalid @enderror" required>
        @error('content')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <button type="submit">Tambah</button>
    </form>



                    
                        
                        

@endsection 

