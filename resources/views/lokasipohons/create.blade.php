@extends('layouts.content')

@section('title', 'Tambah Lokasi Pohon')

@section('content')
    <div class="card my-3">
        <div class="card-body">
            <form action="{{ route('lokasipohons.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        {{-- <div class="form-group">
                            <label for="koordinat">Koordinat</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="koordinat" id="koordinat"
                                    value="{{ old('koordinat') }}" placeholder="Masukkan Koordinat">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary" id="use-map-coordinates">Gunakan
                                        Koordinat Peta</button>
                                </div>
                            </div>
                            @error('koordinat')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label for="jalur_pohon">Jalur Pohon</label>
                            <input type="text" class="form-control" name="jalur_pohon" id="jalur_pohon"
                                value="{{ old('jalur_pohon') }}" placeholder="....">
                            @error('jalur_pohon')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="plot_pohon">Plot Pohon</label>
                            <input type="text" class="form-control" name="plot_pohon" id="plot_pohon"
                                value="{{ old('plot_pohon') }}" placeholder="....">
                            @error('plot_pohon')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Tambah</button>
                        <a href="{{ route('lokasipohons.index') }}" class="btn btn-secondary my-3">
                            <span class="text">Kembali</span>
                        </a>
                    </div>
            </form>
        </div>
    </div>

@endsection
