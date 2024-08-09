@extends('layouts.content')

@section('title', 'Edit Kegiatan Pemeliharaan')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="mb-3">"{{ $semai->kategori_pohon->nama }}"</h3>
            <form action="{{ route('semais.update', $semai->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="kategori_pohon">Kategori Pohon</label>
                            <input type="date" class="form-control" name="kategori_pohon" id="kategori_pohon"
                                value="{{ old('kategori_pohon', $semai->kategori_pohon) }}" placeholder="....">
                            @error('nama')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_lokal">Nama Lokal</label>
                            <input type="text" class="form-control" name="nama_lokal" id="nama_lokal"
                                value="{{ old('nama_lokal', $semai->nama_lokal) }}" placeholder="....">
                            @error('nama_lokal')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_ilmiah">Nama Ilmiah</label>
                            <input type="text" class="form-control" name="nama_ilmiah" id="nama_ilmiah"
                                value="{{ old('nama_ilmiah', $semai->nama_ilmiah) }}" placeholder="....">
                            @error('nama_ilmiah')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tgl_tanam">Tanggal Tanam</label>
                            <input type="date" id="tgl_tanam" class="form-control" name="tgl_tanam" value="{{ old('tgl_tanam', $pohon->tgl_tanam) }}">
                            @error('tgl_tanam')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kondisi">Kondisi</label>
                            <select class="form-control" id="kondisi" name="kondisi">
                                <option selected disabled>Pilih Kondisi</option>
                                <option value="1">Baik</option>
                                <option value="2">Rusak Ringan</option>
                                <option value="3">Rusak Berat</option>
                            </select>
                            @error('kondisi')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning">Edit</button>
                <a href="{{ route('semais.index') }}" class="btn btn-secondary my-3">
                    <span class="text">Kembali</span>
                </a>
            </form>
        </div>
    </div>
@endsection
