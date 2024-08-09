@extends('layouts.content')

@section('title', 'Tambah Kategori Pohon')

@section('content')

    <div class="card my-3">
        <div class="card-body">
            <form action="{{ route('kategoripohons.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input type="text"   class="form-control" name="nama" id="nama" value="{{ old('nama') }}" placeholder="....">
                            @error('nama')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Tambah</button>
                        <a href="{{ route('kategoripohons.index') }}" class="btn btn-secondary my-3">
                            <span class="text">Kembali</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
