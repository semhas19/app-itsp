@extends('layouts.content')

@section('title', 'Detail Data Penebangan')

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

<a href="{{ route('penebangans.index') }}" class="btn btn-icon-split btn-secondary btn-sm my-3">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Kembali</span>
</a>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Lokal</th>
                        <td>{{ $penebangan->nama_lokal }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ilmiah</th>
                        <td><i>{{ $penebangan->nama_ilmiah }}</i></td>
                    </tr>
                    <tr>
                        <th>Kode Pohon</th>
                        <td>{{ $penebangan->kode_pohon }}</td>
                    </tr>
                    <tr>
                        <th>Tinggi Pohon</th>
                        <td>{{ number_format($penebangan->tinggi_pohon) }} (m)</td>
                    </tr>
                    <tr>
                        <th>Keliling Pohon</th>
                        <td>{{ number_format($penebangan->keliling_pohon) }} (cm)</td>
                    </tr>
                    <tr>
                        <th>Diameter Pohon</th>
                        <td>{{ number_format($penebangan->diameter_pohon) }} (cm)</td>
                    </tr>
                    <tr>
                        <th>Volume Pohon</th>
                        <td>{{ number_format($penebangan->volume_pohon, 2) }} (cm)</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th>Tanggal Penebangan</th>
                        <td>{{ $penebangan->formatted_tgl_tebang }}</td>
                    </tr>
                    <tr>
                        <th>Kondisi</th>
                        <td>
                            {{ $penebangan->kondisi == '1' ? 'Baik' : ($penebangan->kondisi == '2' ? 'Rusak Ringan' : 'Rusak Berat') }}
                        </td>
                    </tr>
                    <tr>
                        <th>Catatan</th>
                        <td>{{ $penebangan->note }}</td>
                    </tr>
                    {{-- <tr>
                        <th>Gambar</th>
                        <td>
                            @if ($penebangan->gambar)
                                <a class="btn btn-icon-split btn-primary" data-toggle="modal" data-target="#myModal" data-image="{{ asset('images/' . $penebangan->gambar) }}">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                    <span class="text text-white">Lihat</span>
                                </a>
                            @else
                                <p>Tidak ada gambar</p>
                            @endif
                        </td>
                    </tr> --}}
                    <tr>
                        <th>Jalur Pohon</th>
                        <td>{{ $penebangan->lokasi_pohon->jalur_pohon }}</td>
                    </tr>
                    <tr>
                        <th>Plot Pohon</th>
                        <td>{{ $penebangan->lokasi_pohon->plot_pohon }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Pohon</th>
                        <td>{{ $penebangan->jenis_pohon->nama }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="myModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Gambar {{ $penebangan->nama_lokal }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('images/' . $penebangan->gambar) }}" alt="Gambar Pohon" class="img-fluid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
</script>
@endpush
