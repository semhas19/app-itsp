@extends('layouts.content')

@section('title')
    Detail Data Pohon : {{ $pohon->kode_pohon }} (Kode Pohon)
@endsection

@section('content')
<style>
    .card {
        padding: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed; /* Pastikan kolom memiliki lebar tetap */
    }

    .table th, .table td {
        padding: 10px;
        vertical-align: top;
        overflow-wrap: break-word; /* Tangani kata-kata panjang */
        word-wrap: break-word;
        text-align: left; /* Rata kiri teks untuk konsistensi */
    }

    .table th {
        background-color: #f8f9fa;
        font-weight: bold;
        width: 200px; /* Sesuaikan lebar untuk memastikan ruang yang cukup */
    }

    .table td {
        max-width: 300px; /* Batasi lebar sel untuk mencegah meluber */
    }

    .btn {
        margin-top: 20px;
    }

    /* Penyesuaian responsif */
    @media (max-width: 768px) {
        .table th, .table td {
            display: block;
            width: 100%;
            box-sizing: border-box;
        }

        .table th {
            text-align: left;
        }
    }
</style>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th>Kode Pohon</th>
                        <td>{{ $pohon->kode_pohon }}</td>
                    </tr>
                    <tr>
                        <th>Kategori Pohon</th>
                        <td>{{ $pohon->jenis_pohon->kategori_pohon->nama }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Pohon</th>
                        <td>{{ $pohon->jenis_pohon->nama_lokal }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ilmiah</th>
                        <td><i>{{ $pohon->jenis_pohon->nama_ilmiah }}</i></td>
                    </tr>
                    <tr>
                        <th>Tanggal Tanam</th>
                        <td>{{ $pohon->formatted_tgl_tanam }}</td>
                    </tr>
                    <tr>
                        <th>Kondisi</th>
                        <td>{{ $pohon->kondisi == '1' ? 'Baik' : ($pohon->kondisi == '2' ? 'Rusak Ringan' : 'Rusak Berat') }}</td>
                    </tr>
                    <tr>
                        <th>Jalur Pohon</th>
                        <td>{{ $pohon->lokasi_pohon->jalur_pohon }}</td>
                    </tr>
                    <tr>
                        <th>Plot Pohon</th>
                        <td>{{ $pohon->lokasi_pohon->plot_pohon }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th>Diameter</th>
                        <td>{{ $pohon->diameter }} cm</td>
                    </tr>
                    <tr>
                        <th>Tinggi Jalon/Galah</th>
                        <td>{{ $pohon->tinggi_jalon }} m</td>
                    </tr>
                    <tr>
                        <th>H Top</th>
                        <td>{{ $pohon->h_top }}</td>
                    </tr>
                    <tr>
                        <th>H Pole</th>
                        <td>{{ $pohon->h_pole }}</td>
                    </tr>
                    <tr>
                        <th>H Base</th>
                        <td>{{ $pohon->h_base }}</td>
                    </tr>
                    <tr>
                        <th>Tinggi Pohon</th>
                        <td>{{ number_format($pohon->tinggi_pohon, 2) }} m</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pengukuran</th>
                        <td>{{ $pohon->formatted_tgl_pengukuran }}</td>
                    </tr>
                    <tr>
                        <th>Volume Pohon</th>
                        <td>{{ number_format($pohon->volume_pohon, 2) }} (m³)</td>
                    </tr>
                    <tr>
                        <th>Catatan</th>
                        <td>{{ $pohon->note }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<a href="{{ route('pohons.index') }}" class="btn btn-icon-split btn-secondary btn-sm my-3">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Kembali</span>
</a>

@endsection

@push('scripts')
<script>
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
</script>
@endpush
