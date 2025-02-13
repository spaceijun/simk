@extends('templates.header')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            {{-- Success Message --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible bg-success text-white alert-label-icon fade show material-shadow"
                    role="alert">
                    <i class="ri-user-smile-line label-icon"></i>
                    <strong>Success</strong> - {{ session('success') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
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
                        class="btn btn-info btn-sm">
                        <i class="las la-plus"></i> Tambah Kategori
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Sub Kategori</th>
                                    <th>Tipe</th>
                                    <th>Update</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoris as $index => $kat)
                                    <tr>
                                        <td> {{ $index + 1 }} </td>
                                        <td> {{ $kat->nama_kategori }} </td>
                                        <td> {{ $kat->sub_kategori }} </td>
                                        <td> {{ $kat->tipe }} </td>
                                        <td> {{ $kat->updated_at }} </td>
                                        <td>
                                            <a href="{{ route('kategori.edit', $kat->id) }}"
                                                class="btn btn-primary btn-sm"><i class="las la-edit"></i>Edit</a>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteKategoriModal" data-id="{{ $kat->id }}"><i
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
                    <form id="addKategoriForm" action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_kategori" class="form-label">Nama Kategori</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="sub_kategori" class="form-label">Sub Kategori</label>
                            <input type="text" name="sub_kategori" id="sub_kategori" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipe" class="form-label">Tipe Kategori</label>
                            <select name="tipe" id="tipe" class="form-control">
                                <option value="PEMASUKAN">PEMASUKAN</option>
                                <option value="PENGELUARAN">PENGELUARAN</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal Sukses --}}
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Sukses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ session('danger') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Error Message --}}
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show material-shadow"
            role="alert">
            <i class="ri-close-circle-line label-icon"></i>
            <strong>Error</strong> - {{ session('error') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    @endif

    {{-- Modal Delete Kategori --}}
    <div class="modal fade" id="deleteKategoriModal" tabindex="-1" aria-labelledby="deleteKategoriModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteKategoriModalLabel">Hapus Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus Kategori ini?</p>
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
                form.action = window.location.origin + "/admin/kategori/" + id;
            });
        });
    </script>
@endsection
