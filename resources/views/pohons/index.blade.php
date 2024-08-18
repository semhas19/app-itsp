@extends('layouts.content')

@section('title', 'Data Pohon')

@section('content')

    <div class="d-flex mb-3">
        <a href="{{ route('pohons.create') }}" class="btn btn-success btn-icon-split btn-sm mr-2">
            <span class="icon text-white-50">
                <i class="fas fa-plus" style="color: white"></i>
            </span>
            <span class="text">Tambah</span>
        </a>

        <a href="{{ route('pohon-print-pdf') }}" class="btn btn-danger btn-icon-split btn-sm" target="_blank">
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
                        <th class="text-center">Jenis Pohon</th>
                        <th class="text-center">Tanggal Tanam</th>
                        <th class="text-center">Kondisi Pohon</th>
                        <th class="text-center">Lokasi Pohon</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pohons as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->kode_pohon }}</td>
                            <td>{{ $value->jenis_pohon->nama_lokal }}</td>
                            <td>{{ $value->formatted_tgl_tanam }}</td>
                            <td>
                                {{ $value->kondisi == '1' ? 'Baik' : ($value->kondisi == '2' ? 'Rusak Ringan' : 'Rusak Berat') }}
                            </td>
                            <td>{{ $value->lokasi_pohon->plot_pohon }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="mx-1 flex-fill">
                                        <a href="{{ route('qr-code', $value->id) }}" target="_blank"
                                            class="btn btn-primary btn-sm btn-block">
                                            <i class="fas fa-qrcode"></i>
                                        </a>
                                    </div>
                                    <div class="mx-1 flex-fill">
                                        <a href="{{ route('pohons.show', $value->id) }}"
                                            class="btn btn-info btn-sm btn-block">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="mx-1 flex-fill">
                                        <a href="{{ route('pohons.edit', $value->id) }}"
                                            class="btn btn-warning btn-sm btn-block">
                                            <i class="fas fa-edit" style="color: white"></i>
                                        </a>
                                    </div>
                                    <div class="mx-1 flex-fill">
                                        <form id="delete-form-{{ $value->id }}"
                                            action="{{ route('pohons.destroy', $value->id) }}" method="POST"
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
