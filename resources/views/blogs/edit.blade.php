@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <h1>BLogs</h1>
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{  session()->get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('blog.update', $blog->id) }}" method="post"> 
                        @method('PUT')
                        @csrf
                        <table class="table">
                            <tr>
                                <td>Title</td>
                                <td><input type="text" name="title" value="{{ old('title', $blog->title) }}" class="@error('title') is-invalid @enderror" required></td>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </tr>

                            <tr>
                                <td>Content</td>
                                <td><textarea name="content" class="@error('content') is-invalid @enderror" required cols="30" rows="10" placeholder="isi dengan benar">{{ old('title', $blog->title) }}</textarea></td>
                                @error('content')
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

