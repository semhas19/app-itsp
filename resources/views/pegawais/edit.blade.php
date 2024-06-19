@extends('layouts.content')

@section('title', 'Edit Data pegawai')

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="mb-3">"{{$pegawai->name}}"</h3>
        <form action="{{ route('pegawais.update', $pegawai->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="email">Email pegawai</label>
                        <input type="text" class="form-control" name="email" id="email"
                            value="{{ old('email', $pegawai->email) }}" placeholder="....">
                        @error('email')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Nama pegawai</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ old('name', $pegawai->name) }}" placeholder="....">
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username pegawai</label>
                        <input type="text" class="form-control" name="username" id="username"
                            value="{{ old('username', $pegawai->username) }}" placeholder="....">
                        @error('username')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="....">{{ old('password') }}</textarea>
                        @error('password')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Edit</button>
            <a href="{{ route('pegawais.index')  }}" class="btn btn-secondary my-3">
                <span class="text">Kembali</span>
            </a>
        </form>
    </div>
</div>
@endsection
