
@extends('layouts.app')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="caption ">
                    @foreach ( $captions as $index => $caption)
                    <h1>{{ $caption->title }}</h1>
                    <p>{{ $caption->content }}</p>
                    @endforeach
                </div>
            </div>
            <form action="{{ route('caption.store') }}" method="post">
                @csrf
                
                <label for="title">title</label>
                <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror" required>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <label for="content">caption</label>
                <input type="text" name="content" id="content" class="@error('content') is-invalid @enderror" required>
                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <button type="submit">Tambah</button>
            </form>
        </div>
        @foreach ( $captions as $index => $caption)
            <tr>
                {{-- <td>{{ $index + 1 }}</td> --}}
                <td>{{ $caption->content }}</td>
                <td>
                            <div class="d-flex">
                                <td><a class="btn btn-success" href="{{ route('caption.edit', $caption->id) }}">Edit</a></td>

                                <form action="{{ route('caption.destroy', $caption->id) }}" method="post">
                                    @csrf
                                    @method("delete")
                                    <td><button class="btn btn-danger" type="submit">Hapus</button></td>
                                </form>
                                
                            </div>
                        </td>
            </tr>    
            @endforeach
    </div>
</body>
</html>