@extends('layouts.content')

@section('title', 'Data Penebangan')

@section('content')

    <div class="d-flex mb-3">
        <a href="{{ route('penebangans.create') }}" class="btn btn-success btn-icon-split btn-sm mr-2">
            <span class="icon text-white-50">
                <i class="fas fa-plus" style="color: white"></i>
            </span>
            <span class="text">Tambah</span>
        </a>

        <a href="{{ route('penebangan-print-pdf') }}" class="btn btn-danger btn-icon-split btn-sm" target="_blank">
            <span class="icon text-white-50">
                <i class="fas fa-file-pdf" style="color: white"></i>
            </span>
            <span class="text">Print PDF</span>
        </a>
    </div>
    <div class="card">
        <div class="card-body table-responsive">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Kode Pohon</th>
                        <th class="text-center">Nama Lokal</th>
                        <th class="text-center">Nama Ilmiah</th>
                        <th class="text-center">Tanggal Penebangan</th>
                        <th class="text-center">Kondisi Pohon</th>
                        <th class="text-center">Lokasi Pohon</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penebangans as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->kode_pohon }}</td>
                            <td>{{ $value->nama_lokal }}</td>
                            <td>{{ $value->nama_ilmiah }}</td>
                            <td>{{ $value->formatted_tgl_tebang }}</td>
                            <td>
                                {{ $value->kondisi == '1' ? 'Baik' : ($value->kondisi == '2' ? 'Rusak Ringan' : 'Rusak Berat') }}
                            </td>
                            <td>{{ $value->lokasi_pohon->plot_pohon }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="mx-1 flex-fill">
                                        <a href="{{ route('penebangans.show', $value->id) }}"
                                            class="btn btn-info btn-sm btn-block">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="mx-1 flex-fill">
                                        <a href="{{ route('penebangans.edit', $value->id) }}"
                                            class="btn btn-warning btn-sm btn-block">
                                            <i class="fas fa-edit" style="color: white"></i>
                                        </a>
                                    </div>
                                    <div class="mx-1 flex-fill">
                                        <form id="delete-form-{{ $value->id }}"
                                            action="{{ route('penebangans.destroy', $value->id) }}" method="POST"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="button" class="btn btn-danger btn-sm btn-block"
                                                onclick="confirmDelete('delete-form-{{ $value->id }}')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confirmDelete(formId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            })
        }
    </script>
@endpush
