@extends('layouts.content')

@section('title', 'Edit Kategori Pohon')

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="mb-3">"{{$kategoripohon->nama}}"</h3>
        <form method="POST" action="{{ route('kategoripohons.update', $kategoripohon->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="nama">Nama Pohon</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ $kategoripohon->nama }}" placeholder="....">
                        @error('nama')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Edit</button>
            <a href="{{ route('kategoripohons.index')  }}" class="btn btn-secondary my-3">
                <span class="text">Kembali</span>
            </a>
        </form>
    </div>
</div>
@endsection
