@extends('templates.header')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Kategori</h4>
            </div>
            <div class="card-body">
                <form id="editKategoriForm" action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="{{ $kategori->id }}">
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
                            value="{{ $kategori->nama_kategori }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="sub_kategori" class="form-label">Sub Kategori</label>
                        <input type="text" name="sub_kategori" id="sub_kategori" class="form-control"
                            value="{{ $kategori->sub_kategori }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipe" class="form-label">Tipe kategori</label>
                        <select name="tipe" id="tipe" class="form-control">
                            <option value="PENGELUARAN" {{ $kategori->tipe == 'PEMASUKAN' ? 'selected' : '' }}>BANK</option>
                            <option value="PENGELUARAN" {{ $kategori->tipe == 'PENGELUARAN' ? 'selected' : '' }}>EMONEY</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection