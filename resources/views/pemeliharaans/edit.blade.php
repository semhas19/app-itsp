@extends('layouts.content')

@section('title', 'Edit Kegiatan Pemeliharaan')

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="mb-3">"{{$pemeliharaan->formatted_tgl_kegiatan}}"</h3>
        <form action="{{ route('pemeliharaans.update', $pemeliharaan->kegiatan) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="tgl_kegiatan">Tanggal Kegiatan</label>
                        <input type="date" class="form-control" name="tgl_kegiatan" id="tgl_kegiatan" value="{{ $pemeliharaan->tgl_kegiatan }}" placeholder="Masukkan Jalur Pohon">
                        @error('nama')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kegiatan">Kegiatan</label>
                        <input type="text" class="form-control" name="kegiatan" id="kegiatan" value="{{ $pemeliharaan->kegiatan }}" placeholder="Masukkan Koordinat Pohon">
                        @error('nama')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="petugas">Petugas</label>
                        <input type="text" class="form-control" name="petugas" id="petugas" value="{{ $pemeliharaan->petugas }}" placeholder="Masukkan Plot Pohon">
                        @error('petugas')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="petugas">Petugas</label>
                        <input type="text" class="form-control" name="petugas" id="petugas" value="{{ $pemeliharaan->petugas }}" placeholder="Masukkan Plot Pohon">
                        @error('petugas')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Edit</button>
            <a href="{{ route('pemeliharaans.index')  }}" class="btn btn-secondary my-3">
                <span class="text">Kembali</span>
            </a>
        </form>
    </div>
</div>
@endsection
