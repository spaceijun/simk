@extends('templates.header')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Kategori</h4>
                </div>
                <div class="card-body">
                    <form id="editKategoriForm" action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="akun_id" class="form-label">Akun Bank / E-wallet</label>
                            <select name="akun_id" id="akun_id" class="form-select" required>
                                <option value="" disabled>Pilih Akun</option>
                                @foreach ($akun as $akuns)
                                    <option value="{{ $akuns->id }}"
                                        {{ $akuns->id == $transaksi->akun_id ? 'selected' : '' }}>
                                        {{ $akuns->nama_akun }} ({{ $akuns->no_rek }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="kategori_id" class="form-label">Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="form-select" required>
                                <option value="" disabled>Pilih Kategori</option>
                                @foreach ($kategori as $kat)
                                    <option value="{{ $kat->id }}"
                                        {{ $kat->id == $transaksi->kategori_id ? 'selected' : '' }}>
                                        {{ $kat->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control"
                                value="{{ old('tanggal', $transaksi->tanggal) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control"
                                value="{{ old('jumlah', $transaksi->jumlah) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis Transaksi</label>
                            <select name="jenis" id="jenis" class="form-control" required>
                                <option value="PEMASUKAN" {{ $transaksi->jenis == 'PEMASUKAN' ? 'selected' : '' }}>
                                    PEMASUKAN</option>
                                <option value="PENGELUARAN" {{ $transaksi->jenis == 'PENGELUARAN' ? 'selected' : '' }}>
                                    PENGELUARAN</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" required>{{ old('keterangan', $transaksi->keterangan) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
