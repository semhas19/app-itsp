@extends('layouts.content')

@section('title', 'Detail Kategori Pohon')

@section('content')
<style>
    th {
        max-width: 40px;
    }
</style>

<div class="card">
    <table class="table table-borderless">
        <tr>
            <th>Nama Kategori</th>
            <td>{{ $kategoripohon->nama }}</td>
        </tr>
    </table>
</div>
<a href="{{ route('kategoripohons.index') }}" class="btn btn-icon-split btn-secondary btn-sm my-3">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Kembali</span>
</a>
@endsection

