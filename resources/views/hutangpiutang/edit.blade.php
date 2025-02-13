@extends('templates.header')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Hutang Piutang</h4>
                </div>
                <div class="card-body">
                    <form id="editKategoriForm" action="{{ route('hutangpiutang.update', $hutangpiutang->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id" value="{{ $hutangpiutang->id }}">
                        <div class="mb-3">
                            <label for="akun_id" class="form-label">Akun Bank / E-wallet</label>
                            <select name="akun_id" id="akun_id" class="form-select" required>
                                <option value="" disabled>Pilih Akun</option>
                                @foreach ($akun as $akuns)
                                    <option value="{{ $akuns->id }}"
                                        {{ $akuns->id == $hutangpiutang->akun_id ? 'selected' : '' }}>
                                        {{ $akuns->nama_akun }} ({{ $akuns->no_rek }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_pihak" class="form-label">Nama Pihak</label>
                            <input type="text" name="nama_pihak" id="nama_pihak" class="form-control"
                                value="{{ old('nama_pihak', $hutangpiutang->nama_pihak) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select name="jenis" id="jenis" class="form-control">
                                <option value="HUTANG" {{ $hutangpiutang->jenis == 'HUTANG' ? 'selected' : '' }}>HUTANG
                                </option>
                                <option value="PIUTANG" {{ $hutangpiutang->jenis == 'PIUTANG' ? 'selected' : '' }}>PIUTANG
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="number" name="nominal" id="nominal" class="form-control"
                                value="{{ old('nominal', $hutangpiutang->nominal) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="jatuh_tempo" class="form-label">Jatuh Tempo</label>
                            <input type="date" name="jatuh_tempo" id="jatuh_tempo" class="form-control"
                                value="{{ old('jatuh_tempo', $hutangpiutang->jatuh_tempo) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="tipe" class="form-control">
                                <option value="BELUM DIBAYAR"
                                    {{ $hutangpiutang->jenis == 'BELUM BAYAR' ? 'selected' : '' }}>BELUM DIBAYAR</option>
                                <option value="LUNAS" {{ $hutangpiutang->jenis == 'LUNAS' ? 'selected' : '' }}>LUNAS
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
