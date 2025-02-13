@extends('templates.header')
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <table>
                        <tbody>
                            <tr>
                                <td>Total <strong>Pemasukan</strong></td>
                                <td>:</td>
                                <td><span class="badge bg-info-subtle text-info badge-border">Rp.
                                        {{ number_format($jmlPemasukan, 0, ',', '.') }} </span></td>
                            </tr>
                            <tr>
                                <td>Total <strong>Pengeluaran</strong></td>
                                <td>:</td>
                                <td><span class="badge bg-danger-subtle text-danger badge-border">Rp.
                                        {{ number_format($jmlPengeluaran, 0, ',', '.') }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
                <h4 class="card-title">Data Transaksi</h4>
                <a id="tabBtn" href="" data-bs-toggle="modal" data-bs-target="#tambahKategoriModal"
                    class="btn btn-primary btn-sm">
                    <i class="las la-plus"></i> Tambah Transaksi
                </a>
            </div>
            <div class="card-body">
                <div class="table responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Akun</th>
                                <th>Nama KAtegori</th>
                                <th>Tgl Transaksi</th>
                                <th>Jumlah</th>
                                <th>Jenis Transaksi</th>
                                <th>Keterangan</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $index => $trans)
                                <tr>
                                    <td> {{ $transaksi->firstItem() + $index }} </td>
                                    <td> {{ $trans->akun->nama_akun }} </td>
                                    <td> {{ $trans->kategori->nama_kategori }} </td>
                                    <td> {{ $trans->tanggal }} </td>
                                    <td> Rp. {{ number_format($trans->jumlah, 0, ',', '.') }} </td>
                                    <td> <span
                                            class="badge badge-border {{ $trans->jenis == 'PEMASUKAN' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                                            {{ $trans->jenis }}
                                        </span>
                                    </td>
                                    <td> {{ $trans->keterangan }} </td>
                                    <td> {{ $trans->updated_at->format('d-m-Y') }} </td>
                                    <td>
                                        <a href="{{ route('transaksi.edit', $trans->id) }}"
                                            class="btn btn-primary btn-sm"><i class="las la-edit"></i>Edit</a>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteKategoriModal" data-id="{{ $trans->id }}"><i
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
                            Showing <span class="fw-semibold">{{ $transaksi->firstItem() }}</span> to
                            <span class="fw-semibold">{{ $transaksi->lastItem() }}</span> of
                            <span class="fw-semibold">{{ $transaksi->total() }}</span> Results
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <ul
                            class="pagination pagination-separated pagination-sm justify-content-center justify-content-sm-start mb-0">
                            {{-- Tombol Previous --}}
                            @if ($transaksi->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">←</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a href="{{ $transaksi->previousPageUrl() }}" class="page-link">←</a>
                                </li>
                            @endif

                            {{-- Nomor Halaman --}}
                            @foreach ($transaksi->getUrlRange(1, $transaksi->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $transaksi->currentPage() ? 'active' : '' }}">
                                    <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                                </li>
                            @endforeach

                            {{-- Tombol Next --}}
                            @if ($transaksi->hasMorePages())
                                <li class="page-item">
                                    <a href="{{ $transaksi->nextPageUrl() }}" class="page-link">→</a>
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

    <!-- Modal Tambah Kategori -->
    <div class="modal fade" id="tambahKategoriModal" tabindex="-1" aria-labelledby="tambahKategoriModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahKategoriModalLabel">Tambah Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addKategoriForm" action="{{ route('transaksi.store') }}" method="POST">
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
                            <label for="kategori_id" class="form-label">Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="form-select">
                                <option value="" disabled selected>Pilih Kategori</option>
                                @if (!empty($kategori) && $kategori->isNotEmpty())
                                    @foreach ($kategori as $kat)
                                        <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis Transaksi</label>
                            <select name="jenis" id="jenis" class="form-control">
                                <option value="PEMASUKAN">PEMASUKAN</option>
                                <option value="PENGELUARAN">PENGELUARAN</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="" class="form-control">-</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
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
                    <h5 class="modal-title" id="deleteKategoriModalLabel">Hapus Data Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus Data Transaksi ini?</p>
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
                form.action = window.location.origin + "/admin/transaksi/" + id;
            });
        });
    </script>
@endsection
