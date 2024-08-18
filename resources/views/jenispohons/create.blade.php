@extends('layouts.content')

@section('title', 'Tambah Jenis Pohon')

@section('content')

    <div class="card my-3">
        <div class="card-body">
            <form action="{{ route('jenispohons.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">                        
                        <div class="form-group">
                            <label for="kategori_pohon">Kategori Pohon</label>
                            <select class="form-control" name="kategori_pohon_id">
                                <option selected="true" disabled="disabled">Pilih Kategori Pohon</option>
                                @foreach ($kategoripohons as $kategoripohon)
                                    <option value="{{ $kategoripohon->id }}">{{ $kategoripohon->nama }}</option>
                                @endforeach
                            </select>
                            @error('kategoripohon_id')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_lokal">Nama Lokal</label>
                            <input type="text" class="form-control" name="nama_lokal" id="nama_lokal"
                                value="{{ old('nama_lokal') }}" placeholder="....">
                            @error('nama_lokal')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_ilmiah">Nama Ilmiah</label>
                            <input type="text" class="form-control" name="nama_ilmiah" id="nama_ilmiah"
                                value="{{ old('nama_ilmiah') }}" placeholder="....">
                            @error('nama_ilmiah')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Pohon</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="....">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Tambah</button>
                        <a href="{{ route('jenispohons.index') }}" class="btn btn-secondary my-3">
                            <span class="text">Kembali</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
