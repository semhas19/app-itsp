@extends('layouts.content')

@section('title', 'Detail Kegiatan Pemeliharaan')

@section('content')
<style>
    th {
        max-width: 40px;
    }
</style>

<div class="card">
    <table class="table table-borderless">
        <tr>
            <th>Tanggal Kegiatan</th>
            <td>{{ $pemeliharaan->tgl_kegiatan }}</td>
        </tr>
        <tr>
            <th>Kegiatan</th>
            <td>{{ $pemeliharaan->kegiatan }}</td>
        </tr>
        <tr>
            <th>Petugas</th>
            <td>{{ $pemeliharaan->petugas }}</td>
        </tr>
        <tr>
            <th>Data Pohon</th>
            <td>{{ $pemeliharaan->pohon->nama_lokal }}</td>
        </tr>
    </table>
</div>
<a href="{{ route('pemeliharaans.index') }}" class="btn btn-icon-split btn-secondary btn-sm my-3">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Kembali</span>
</a>
@endsection

