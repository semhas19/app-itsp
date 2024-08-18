@extends('layouts.content')

@section('title', 'Data Lokasi Pohon')

@section('content')
    <a href="{{ route('lokasipohons.create') }}" class="btn btn-success btn-icon-split btn-sm mb-3">
        <span class="icon text-white-50">
            <i class="fas fa-plus" style="color: white"></i>
        </span>
        <span class="text">Tambah</span>
    </a>
    <div class="card">
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        {{-- <th class="text-center">Blok</th> --}}
                        <th class="text-center">Jalur Pohon</th>
                        <th class="text-center">Plot Pohon</th>
                        <th class="text-center">Koordinat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lokasipohons as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            {{-- <td>{{ $value->blok }}</td> --}}
                            <td>{{ $value->jalur_pohon }}</td>
                            <td>{{ $value->plot_pohon }}</td>
                            <td>{{ $value->koordinat }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('lokasipohons.show', $value->id) }}" class="btn btn-info btn-sm mx-1">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('lokasipohons.edit', $value->id) }}" class="btn btn-warning btn-sm mx-1">
                                        <i class="fas fa-edit" style="color: white"></i>
                                    </a>
                                    <form id="delete-form-{{ $value->id }}" action="{{ route('lokasipohons.destroy', $value->id) }}" method="POST" class="d-inline mx-1">
                                        @method('delete')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('delete-form-{{ $value->id }}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
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
