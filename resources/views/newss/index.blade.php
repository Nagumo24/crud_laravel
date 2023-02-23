@extends('layouts.app')

@section('content')

        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{  session()->get('success') }}
        </div>
        @endif
        <h1>Newss</h1>
        <form action="{{ route('news.store') }}" method="post">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror" required>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="paragraf">Paragraf</label>
            <input type="text" name="paragraf" id="paragraf" class="@error('paragraf') is-invalid @enderror" required>
            @error('paragraf')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="image">Upload Your Image</label>
            <input type="text" name="image" id="image" class="@error('image') is-invalid @enderror" required>
            @error('image')
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
                <td>news</td>
                <td>paragraf</td>
                <td>image</td>
                <td>edit</td>

            </tr>
            @foreach ( $newss as $index => $news)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->paragraf }}</td>
                <td>{{ $news->image }}</td>
                <td>
                            <div class="d-flex">
                                <td>
                                    <a class="btn btn-success" href="{{ route('news.edit', $news->id) }}">Edit</a>

                                    <form action="{{ route('news.destroy', $news->id) }}" method="post">
                                        @csrf
                                        @method("delete")
                                        <td><button class="btn btn-danger" type="submit">Hapus</button></td>
                                    </form>
                                </td>
                                
                            </div>
                        </td>
            </tr>    
            @endforeach
        </table>

@endsection 