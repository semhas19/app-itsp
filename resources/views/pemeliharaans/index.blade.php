@extends('layouts.content')

@section('title', 'Data Pemeliharaan Pohon')

@section('content')
    <div class="d-flex mb-3">
        <a href="{{ route('pemeliharaans.create') }}" class="btn btn-success btn-icon-split btn-sm mr-2">
            <span class="icon text-white-50">
                <i class="fas fa-plus" style="color: white"></i>
            </span>
            <span class="text">Tambah</span>
        </a>

        <a href="{{ route('pemeliharaan-print-pdf') }}" class="btn btn-danger btn-icon-split btn-sm" target="_blank">
            <span class="icon text-white-50">
                <i class="fas fa-file-pdf" style="color: white"></i>
            </span>
            <span class="text">Print PDF</span>
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal Kegiatan</th>
                        <th class="text-center">Kegiatan</th>
                        <th class="text-center">Petugas</th>
                        <th class="text-center">Data Pohon</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemeliharaans as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->formatted_tgl_kegiatan }}</td>
                            <td>{{ $value->kegiatan }}</td>
                            <td>{{ $value->petugas }}</td>
                            <td>{{ $value->pohon->nama_lokal }}</td>
                            <td>
                                <a href="{{ route('pemeliharaans.show', $value->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('pemeliharaans.edit', $value->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit" style="color: white"></i>
                                </a>
                                <form id="delete-form-{{ $value->id }}"
                                    action="{{ route('pemeliharaans.destroy', $value->id) }}" method="POST"
                                    class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="confirmDelete('delete-form-{{ $value->id }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
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
