@extends('layouts.content')

@section('title', 'Detail Lokasi Pohon')

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
            <th>Jalur Pohon</th>
            <td>{{ $lokasipohon->jalur_pohon }}</td>
        </tr>
        <tr>
            <th>Plot Pohon</th>
            <td>{{ $lokasipohon->plot_pohon }}</td>
        </tr>
        <tr>
            <th>Koordinat</th>
            <td>{{ $lokasipohon->koordinat }}</td>
        </tr>
    </table>
</div>
<a href="{{ route('lokasipohons.index') }}" class="btn btn-secondary btn-sm">
    <i class="fas fa-arrow-left"></i>
    <span class="text">Kembali</span>
</a>
@endsection
