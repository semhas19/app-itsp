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
            <th>Kategori</th>
            <td>{{ $semai->kategori_pohon->nama }}</td>
        </tr>
        <tr>
            <th>Nama Lokal</th>
            <td>{{ $semai->nama_lokal }}</td>
        </tr>
        <tr>
            <th>Nama Ilmiah</th>
            <td>{{ $semai->nama_ilmiah }}</td>
        </tr>
        <tr>
            <th>Tanggal Tanam</th>
            <td>{{ $semai->tgl_tanam }}</td>
        </tr>
        <tr>
            <th>Kondisi</th>
            <td>{{ $semai->kondisi }}</td>
        </tr>
    </table>
</div>
<a href="{{ route('semais.index') }}" class="btn btn-icon-split btn-secondary btn-sm my-3">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Kembali</span>
</a>
@endsection

