@extends('layouts.content')

@section('title', 'Edit Data Admin')

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="mb-3">"{{$admin->name}}"</h3>
        <form action="{{ route('admins.update', $admin->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="email">Email Admin</label>
                        <input type="text" class="form-control" name="email" id="email"
                            value="{{ old('email', $admin->email) }}" placeholder="....">
                        @error('email')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Admin</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ old('name', $admin->name) }}" placeholder="....">
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username Admin</label>
                        <input type="text" class="form-control" name="username" id="username"
                            value="{{ old('username', $admin->username) }}" placeholder="....">
                        @error('username')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password Admin</label>
                        <input type="password" class="form-control" name="password" id="password"
                            value="{{ old('password', $admin->password) }}" placeholder="....">
                        @error('password')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password Admin</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                            value="{{ old('password', $admin->password) }}" placeholder="....">
                        @error('password')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Edit</button>
            <a href="{{ route('admins.index')  }}" class="btn btn-secondary my-3">
                <span class="text">Kembali</span>
            </a>
        </form>
    </div>
</div>
@endsection
