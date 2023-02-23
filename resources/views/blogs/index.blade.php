@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <h1>Bloogs</h1>
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{  session()->get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('blog.store') }}" method="post">
                        @csrf
                        <table class="table">
                            <tr>
                                <td>Title</td>
                                <td><input type="text" name="title" id="title" class="@error('title') is-invalid @enderror" required></td>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </tr>

                            <tr>
                                <td>Content</td>
                                <td><textarea type="text" name="content" id="content" class="@error('content') is-invalid @enderror" ols="30" rows="10"></textarea></td>
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
                    

                      <table class="table table-dark table-hover">

                        <tr>
                            <td>No</td>
                            <td>Title</td>
                            <td>Content</td>
                            <td>Aksi</td>
                        </tr>
                        @foreach ( $blogs as $index => $blog)

                        
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->content }}</td>
                            <td>
                        
                            <div class="d-flex">
                                <td><a class="btn btn-success" href="{{ route('blog.edit', $blog->id) }}">Edit</a></td>

                                <form action="{{ route('blog.destroy', $blog->id) }}" method="post">
                                    @csrf
                                    @method("delete")
                                    <td><button class="btn btn-danger" type="submit">Hapus</button></td>
                                </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        
                      </table>

                    
                        
                        
                    

                    
                </div>
            </div>
        </div>
    </div>

    

@endsection 

