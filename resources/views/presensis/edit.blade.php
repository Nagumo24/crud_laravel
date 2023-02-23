@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <h1>Daftar Hadir</h1>
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{  session()->get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('presensi.update', $presensi->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <table class="table">
                            <tr>
                                <td>Nama</td>
                                <td><input type="text" name="nama" id="nama" class="@error('nama') is-invalid @enderror" required></td>
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </tr>

                            <tr>
                                <td>JAM Masuk</td>
                                <td><input type="date" name="jam_masuk" value="{{ old('jam_masuk', $presensi->jam_masuk) }}" class="@error('jam_masuk') is-invalid @enderror" required></td>
                                @error('jam_masuk')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </tr>

                            <tr>
                                <td>Lokasi Masul</td>
                                <td><input type="text" name="lokasi_masuk" value="{{ old('lokasi_masuk', $presensi->lokasi_masuk) }}" class="@error('lokasi_masuk') is-invalid @enderror" required></td>
                                @error('lokasi_masuk')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </tr>
                            
                            <tr>
                                <td><button type="submit">Send</button></td>
                            </tr>
                        </table>
                        
                    
                    </form>

                    {{-- <br>
                    <br>
                    

                      <table class="table table-dark table-hover">

                        <tr>
                            <td>No</td>
                            <td>uuid</td>
                            <td>nama</td>
                            <td>jam masuk</td>
                            <td>lokasi masuk</td>
                        </tr>
                        @foreach ( $presensis as $index => $presensi)

                        
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $presensi->nama }}</td>
                            <td>{{ $presensi->content }}</td>
                            <td>
                        
                            <div class="d-flex">
                                <td><a class="btn btn-success" href="{{ route('presensi.edit', $presensi->id) }}">Edit</a></td>

                                <form action="{{ route('presensi.destroy', $presensi->id) }}" method="post">
                                    @csrf
                                    @method("delete")
                                    <td><button class="btn btn-danger" type="submit">Hapus</button></td>
                                </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        
                      </table> --}}

                    
                        
                        
                    

                    
                </div>
            </div>
        </div>
    </div>

    

@endsection 

