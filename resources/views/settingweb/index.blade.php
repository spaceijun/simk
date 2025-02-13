@extends('templates.header')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="col-lg-12 col-md-12">
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
                        {{-- Menampilkan semua pesan error --}}
                        {!! implode('<br>', $errors->all()) !!}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Data Setting Website</h4>
                    </div>
                    <div class="card-body mx-5 my-3">
                        <form action="{{ route('settingweb.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_website" class="form-label">Title Website</label>
                                <input type="text" name="nama_website" id="nama_website"
                                    value="{{ old('nama_website', $settings->nama_website) }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi_website" class="form-label">Deskripsi Website</label>
                                <textarea name="deskripsi_website" id="deskripsi_website" class="form-control">{{ old('deskripsi_website', $settings->deskripsi_website) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="favicon_website" class="form-label">Favicon</label>
                                <div>
                                    @if ($settings->favicon_website)
                                        <img src="{{ asset('uploads/settingweb/' . $settings->favicon_website) }}"
                                            alt="Favicon" width="100">
                                    @endif
                                </div>
                                <input type="file" name="favicon_website" id="favicon_website" class="form-control">
                                <p class="text-danger">*File harus JPEG, JPG atau PNG</p>
                            </div>
                            <div class="mb-3">
                                <label for="logo_website" class="form-label">Logo Website</label>
                                <div>
                                    @if ($settings->logo_website)
                                        <img src="{{ asset('uploads/settingweb/' . $settings->logo_website) }}"
                                            alt="Logo" width="100">
                                    @endif
                                </div>
                                <input type="file" name="logo_website" id="logo_website" class="form-control">
                                <p class="text-danger">*File harus JPEG, JPG atau PNG</p>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email"
                                    value="{{ old('email', $settings->email) }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">Telepon</label>
                                <input type="text" name="telepon" id="telepon"
                                    value="{{ old('telepon', $settings->telepon) }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat', $settings->alamat) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="copyright" class="form-label">Copyright</label>
                                <input type="text" name="copyright" id="copyright"
                                    value="{{ old('copyright', $settings->copyright) }}" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
