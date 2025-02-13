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
                    <h4 class="card-title">Data Hutang Piutang</h4>
                    <a id="tabBtn" href="" data-bs-toggle="modal" data-bs-target="#tambahKategoriModal"
                        class="btn btn-info btn-sm">
                        <i class="las la-plus"></i> Tambah Hutang Piutang
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Akun Bank/Emoney</th>
                                    <th>Nama Pihak</th>
                                    <th>Jenis</th>
                                    <th>Nominal</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hutangpiutang as $index => $hutang)
                                    <tr>
                                        <td> {{ $index + 1 }} </td>
                                        <td> {{ $hutang->akun->nama_akun }} </td>
                                        <td> {{ $hutang->nama_pihak }} </td>
                                        <td> <span
                                                class="badge badge-border {{ $hutang->jenis == 'PIUTANG' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                                                {{ $hutang->jenis }}
                                            </span>
                                        </td>
                                        <td> Rp. {{ number_format($hutang->nominal, 0, ',', '.') }} </td>
                                        <td> {{ $hutang->jatuh_tempo }} </td>
                                        <td> <span
                                                class="badge badge-border {{ $hutang->status == 'LUNAS' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                                                {{ $hutang->status }}
                                            </span> </td>
                                        <td>
                                            <a href="{{ route('hutangpiutang.edit', $hutang->id) }}"
                                                class="btn btn-primary btn-sm"><i class="las la-edit"></i>Edit</a>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteKategoriModal" data-id="{{ $hutang->id }}"><i
                                                    class="las la-trash"></i>
                                                Hapus
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="align-items-center mt-2 row g-3 text-center text-sm-start">
                        <div class="col-sm">
                            <div class="text-muted">
                                Showing <span class="fw-semibold">{{ $hutangpiutang->firstItem() }}</span> to
                                <span class="fw-semibold">{{ $hutangpiutang->lastItem() }}</span> of
                                <span class="fw-semibold">{{ $hutangpiutang->total() }}</span> Results
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <ul
                                class="pagination pagination-separated pagination-sm justify-content-center justify-content-sm-start mb-0">
                                {{-- Tombol Previous --}}
                                @if ($hutangpiutang->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">←</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a href="{{ $hutangpiutang->previousPageUrl() }}" class="page-link">←</a>
                                    </li>
                                @endif

                                {{-- Nomor Halaman --}}
                                @foreach ($hutangpiutang->getUrlRange(1, $hutangpiutang->lastPage()) as $page => $url)
                                    <li class="page-item {{ $page == $hutangpiutang->currentPage() ? 'active' : '' }}">
                                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                                    </li>
                                @endforeach

                                {{-- Tombol Next --}}
                                @if ($hutangpiutang->hasMorePages())
                                    <li class="page-item">
                                        <a href="{{ $hutangpiutang->nextPageUrl() }}" class="page-link">→</a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link">→</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
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
                    <form id="addKategoriForm" action="{{ route('hutangpiutang.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="akun_id" class="form-label">Akun Bank / Ewallet</label>
                            <select name="akun_id" id="akun_id" class="form-select">
                                <option value="" disabled selected>Pilih Akun</option>
                                @if (!empty($akun) && $akun->isNotEmpty())
                                    @foreach ($akun as $akuns)
                                        <option value="{{ $akuns->id }}">{{ $akuns->nama_akun }}
                                            ({{ $akuns->no_rek }})
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_pihak" class="form-label">Nama Pihak</label>
                            <input type="text" name="nama_pihak" id="nama_pihak" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select name="jenis" id="jenis" class="form-control">
                                <option value="HUTANG">HUTANG</option>
                                <option value="PIUTANG">PIUTANG</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="number" name="nominal" id="nominal" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="jatuh_tempo" class="form-label">Jatuh Tempo</label>
                            <input type="date" name="jatuh_tempo" id="jatuh_tempo" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="tipe" class="form-control">
                                <option value="BELUM DIBAYAR">BELUM DIBAYAR</option>
                                <option value="LUNAS">LUNAS</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah HutangPiutang</button>
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
                    <h5 class="modal-title" id="deleteKategoriModalLabel">Hapus Hutang Piutang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus Hutang Piutang ini?</p>
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
                form.action = window.location.origin + "/admin/hutangpiutang/" + id;
            });
        });
    </script>
@endsection
