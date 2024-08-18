@extends('layouts.content')

@section('title', 'Tambah Lokasi Pohon')

@section('content')
    <div class="card my-3">
        <div class="card-body">
            <form action="{{ route('semais.store') }}" method="POST" enctype="multipart/form-data">
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
                            @error('kategori_pohon_id')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis_pohon">Jenis Pohon</label>
                            <select class="form-control" name="jenis_pohon_id">
                                <option selected="true" disabled="disabled">Pilih Jenis Pohon</option>
                                @foreach ($jenispohons as $jenispohon)
                                    <option value="{{ $jenispohon->id }}">{{ $jenispohon->nama_lokal }}</option>
                                @endforeach
                            </select>
                            @error('jenis_pohon_id')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lokasi_pohon">Jalur Pohon</label>
                            <select class="form-control" name="lokasi_pohon_id">
                                <option selected="true" disabled="disabled">Pilih Jalur Pohon</option>
                                @foreach ($lokasipohons as $lokasipohon)
                                    <option value="{{ $lokasipohon->id }}">{{ $lokasipohon->jalur_pohon }}</option>
                                @endforeach
                            </select>
                            @error('lokasi_pohon_id')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kode_pohon">Kode Pohon</label>
                            <input type="text" class="form-control" name="kode_pohon" id="kode_pohon"
                                value="{{ old('kode_pohon') }}" placeholder="....">
                            @error('kode_pohon')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tgl_tanam">Tanggal Penanaman</label>
                            <input type="date" class="form-control" name="tgl_tanam" id="tgl_tanam"
                                value="{{ old('tgl_tanam') }}" placeholder="....">
                            @error('tgl_tanam')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="note">Catatan</label>
                            <textarea class="form-control" name="note" id="note" placeholder="Catatan">{{ old('note') }}</textarea>
                            @error('note')
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
                        <button type="submit" class="btn btn-success">Tambah</button>
                        <a href="{{ route('semais.index') }}" class="btn btn-secondary my-3">
                            <span class="text">Kembali</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
