@extends('layouts.content')

@section('title', 'Detail Jenis Pohon')

@section('content')
<style>
    .card {
        padding: 20px;
    }
    .table th, .table td {
        padding: 10px;
        vertical-align: top;
    }
    .table th {
        width: 150px;
        background-color: #f8f9fa;
        font-weight: bold;
    }
    .btn {
        margin-top: 20px;
    }
</style>

<div class="card">
    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <td>{{ $jenispohon->nama }}</td>
        </tr>
        <tr>
            <th>Kategori Pohon</th>
            <td>{{ $jenispohon->kategori_pohon->nama }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $jenispohon->deskripsi }}</td>
        </tr>
    </table>
</div>
<a href="{{ route('jenispohons.index') }}" class="btn btn-secondary btn-sm">
    <i class="fas fa-arrow-left"></i>
    <span class="text">Kembali</span>
</a>
@endsection
