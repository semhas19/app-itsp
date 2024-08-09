@extends('layouts.content')

@section('title', 'Detail Pegawai')

@section('content')
<style>
    th {
        max-width: 40px;
    }
</style>

<div class="card">
    <table class="table table-borderless">
        <tr>
            <th>Nama Pegawai</th>
            <td>{{ $pegawai->name }}</td>
        </tr>
        <tr>
            <th>Username pegawai</th>
            <td>{{ $pegawai->username }}</td>
        </tr>
    </table>
</div>
<a href="{{ route('pegawais.index') }}" class="btn btn-icon-split btn-secondary btn-sm my-3">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Kembali</span>
</a>
@endsection

