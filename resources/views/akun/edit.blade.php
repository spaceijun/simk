@extends('templates.header')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Akun</h4>
                </div>
                <div class="card-body">
                    <form id="editKategoriForm" action="{{ route('akun.update', $akun->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id" value="{{ $akun->id }}">
                        <div class="mb-3">
                            <label for="nama_akun" class="form-label">Nama Akun</label>
                            <input type="text" name="nama_akun" id="nama_akun" class="form-control"
                                value="{{ $akun->nama_akun }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_rek" class="form-label">No Rek</label>
                            <input type="number" name="no_rek" id="no_rek" class="form-control"
                                value="{{ $akun->no_rek }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipe" class="form-label">Tipe Akun</label>
                            <select name="tipe" id="tipe" class="form-control">
                                <option value="BANK" {{ $akun->tipe == 'BANK' ? 'selected' : '' }}>BANK</option>
                                <option value="EMONEY" {{ $akun->tipe == 'EMONEY' ? 'selected' : '' }}>EMONEY</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
