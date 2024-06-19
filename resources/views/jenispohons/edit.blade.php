@extends('layouts.content')

@section('title', 'Edit Jenis Pohon')

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="mb-3">"{{$jenispohon->kategori_pohon->nama}}"</h3>
        <form action="{{ route('jenispohons.update', $jenispohon->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="kategori_pohon_id">Kategori Pohon</label>
                        <select class="form-control" name="kategori_pohon_id">
                            <option selected="true" disabled="disabled">Pilih Lokasi Pohon</option>
                            @foreach ($kategoripohons as $kategoripohon)
                                <option value="{{ $kategoripohon->id }}" {{ old('kategori_pohon_id', $jenispohon->kategori_pohon_id) == $kategoripohon->id ? 'selected' : '' }}>{{ $kategoripohon->nama }}</option>
                            @endforeach
                        </select>
                        @error('kategori_pohon_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Pohon</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            value="{{ old('nama', $jenispohon->nama) }}" placeholder="Masukkan Nama Baru">
                        @error('nama')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Catatan">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Edit</button>
            <a href="{{ route('jenispohons.index')  }}" class="btn btn-secondary my-3">
                <span class="text">Kembali</span>
            </a>
        </form>
    </div>
</div>
@endsection
