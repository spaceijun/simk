@extends('templates.header')
@section('content')
    <div class="row">
        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible bg-success text-white alert-label-icon fade show material-shadow"
                role="alert">
                <i class="ri-user-smile-line label-icon"></i>
                <strong>Success</strong> - {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Error Message --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show material-shadow"
                role="alert">
                <i class="ri-close-circle-line label-icon"></i>
                <strong>Error</strong> -
                {!! implode('<br>', $errors->all()) !!}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header align-items-center d-flex justify-content-between">
                <h4 class="card-title">Data Akun</h4>
                <a id="tabBtn" href="" data-bs-toggle="modal" data-bs-target="#tambahKategoriModal"
                    class="btn btn-primary btn-sm">
                    <i class="las la-plus"></i> Tambah Akun
                </a>
            </div>
            <div class="card-body">
                <div class="table responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Akun</th>
                                <th>No Rekening</th>
                                <th>Tipe</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($akun as $index => $akuns)
                                <tr>
                                    <td> {{ $index + 1 }} </td>
                                    <td> {{ $akuns->nama_akun }} </td>
                                    <td> {{ $akuns->no_rek }} </td>
                                    <td> {{ $akuns->tipe }} </td>
                                    <td> {{ $akuns->updated_at->format('d-m-Y') }} </td>
                                    <td>
                                        <a href="{{ route('akun.edit', $akuns->id) }}" class="btn btn-primary btn-sm"><i
                                                class="las la-edit"></i>Edit</a>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteKategoriModal" data-id="{{ $akuns->id }}"><i
                                                class="las la-trash"></i>
                                            Hapus
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Kategori -->
    <div class="modal fade" id="tambahKategoriModal" tabindex="-1" aria-labelledby="tambahKategoriModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahKategoriModalLabel">Tambah Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addKategoriForm" action="{{ route('akun.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_akun" class="form-label">Nama Akun</label>
                            <input type="text" name="nama_akun" id="nama_akun" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_rek" class="form-label">No Rek</label>
                            <input type="number" name="no_rek" id="no_rek" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipe" class="form-label">Tipe Akun</label>
                            <select name="tipe" id="tipe" class="form-control">
                                <option value="BANK">BANK</option>
                                <option value="EMONEY">EMONEY</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Akun</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Delete Kategori -->
    <div class="modal fade" id="deleteKategoriModal" tabindex="-1" aria-labelledby="deleteKategoriModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteKategoriModalLabel">Hapus Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus akun ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteKategoriForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var deleteModal = document.getElementById('deleteKategoriModal');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Tombol yang membuka modal
                var id = button.getAttribute('data-id'); // Ambil ID dari data-id

                var form = deleteModal.querySelector('#deleteKategoriForm');
                form.action = window.location.origin + "/admin/akun/" + id;
            });
        });
    </script>
@endsection
