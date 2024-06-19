@extends('layouts.content')

@section('title', 'Detail Admin')

@section('content')
<style>
    th {
        max-width: 40px;
    }
</style>

<div class="card">
    <table class="table table-borderless">
        <tr>
            <th>Nama Admin</th>
            <td>{{ $admin->name }}</td>
        </tr>
        <tr>
            <th>Username Admin</th>
            <td>{{ $admin->username }}</td>
        </tr>
    </table>
</div>
<a href="{{ route('admins.index') }}" class="btn btn-icon-split btn-secondary btn-sm my-3">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Kembali</span>
</a>
@endsection

