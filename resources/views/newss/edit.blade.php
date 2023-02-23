@if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{  session()->get('success') }}
        </div>
        @endif
        <h1>Newss</h1>
        <form action="{{ route('news.update',$news->id)  }}" method="post">  
            @method('PUT')
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ old('title', $news->title) }}" class="@error('title') is-invalid @enderror" required>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="paragraf">Paragraf</label>
            <input type="text" name="paragraf" value="{{ old('paragraf', $news->paragraf) }}" class="@error('paragraf') is-invalid @enderror" required>
            @error('paragraf')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <label for="image">Upload Your Photo</label>
            <input type="text" name="image" value="{{ old('image', $news->image) }}" class="@error('image') is-invalid @enderror" required>
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <button type="submit">Tambah</button>
        </form>