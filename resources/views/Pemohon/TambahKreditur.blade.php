@extends('/layout.main')
@section('content')
    <div class="container"
        style="margin-top: -2em; border: 1px solid rgb(190, 190, 190); border-radius: 10px; box-shadow: 2px 3px #888888">
        <a class="mt-2 btn btn-outline-warning" href="/pemohon">KEMBALI </a>
        <h2 class="mb-5">{{ $title }}</h2>
        <form class="needs-validation" method="POST" action="/pemohon" novalidate enctype="multipart/form-data">
            @csrf
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nama Debitur <span class="red">*</span></label>
                <div class="col-sm-6">
                    <input type="text" name="nama" class="form-control  @error('nama') is-invalid @enderror"
                        id="staticEmail" style="border: 1px solid rgb(139, 139, 139)" value="{{ old('nama') }}" autofocus
                        required>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">No KTP <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" name="no_ktp" class="form-control @error('no_ktp') is-invalid @enderror"
                        id="staticEmail" style="border: 1px solid rgb(139, 139, 139)" value="{{ old('no_ktp') }}" required>
                    @error('no_ktp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">No HP</label>
                <div class="col-sm-4">
                    <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
                        id="staticEmail" style="border: 1px solid rgb(139, 139, 139)" value="{{ old('no_hp') }}">
                    @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nama Pasangan</label>
                <div class="col-sm-6">
                    <input class="form-control @error('nama_pasangan') is-invalid @enderror" name="nama_pasangan"
                        style="border: 1px solid rgb(139, 139, 139)" value="{{ old('nama_pasangan') }}">
                    @error('nama_pasangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nama Ibu <span class="red">*</span></label>
                <div class="col-sm-6">
                    <input type="text" name="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror"
                        id="staticEmail" style="border: 1px solid rgb(139, 139, 139)" value="{{ old('nama_ibu') }}"
                        required>
                    @error('nama_ibu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Status/Riwayat Nasabah<span class="red">*</span></label>
                <div class="col-sm-6">
                    <input type="text" name="status_nasabah"
                        class="form-control @error('status_nasabah') is-invalid @enderror"
                        style="border: 1px solid rgb(139, 139, 139)" value="{{ old('status_nasabah') }}" required>
                    @error('status_nasabah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Alamat Tempat Tinggal<span class="red">*</span></label>
                <div class="col-sm-8">
                    <input name="alamat_rumah" class="form-control @error('alamat_rumah') is-invalid @enderror"
                        style="border: 1px solid rgb(139, 139, 139)" value="{{ old('alamat_rumah') }}" required>
                    @error('alamat_rumah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Jenis Usaha<span class="red">*</span></label>
                <div class="col-sm-6">
                    <input class="form-control @error('jenis_usaha') is-invalid @enderror" name="jenis_usaha"
                        style="border: 1px solid rgb(139, 139, 139)" value="{{ old('jenis_usaha') }}" required>
                    @error('jenis_usaha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Lama Usaha</label>
                <div class="col-sm-6">
                    <input name="lama_usaha" class="form-control @error('lama_usaha') is-invalid @enderror"
                        style="border: 1px solid rgb(139, 139, 139)" value="{{ old('lama_usaha') }}">
                    @error('lama_usaha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Lokasi Usaha</label>
                <div class="col-sm-6">
                    <input class="form-control @error('lokasi_usaha') is-invalid @enderror" name="lokasi_usaha"
                        style="border: 1px solid rgb(139, 139, 139)" value="{{ old('lokasi_usaha') }}">
                    @error('lokasi_usaha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Lama Menetap Dilokasi Usaha</label>
                <div class="col-sm-6">
                    <input class="form-control @error('lama_menetap') is-invalid @enderror" name="lama_menetap"
                        style="border: 1px solid rgb(139, 139, 139)" value="{{ old('lama_menetap') }}">
                    @error('lama_menetap')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Keperluan Mengajukan Pinjaman<span class="red">*</span></label>
                <div class="col-sm-6">
                    <input class="form-control @error('keperluan') is-invalid @enderror" name="keperluan"
                        style="border: 1px solid rgb(139, 139, 139)" value="{{ old('keperluan') }}" required>
                    @error('keperluan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Tanggal Pengajuan <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="date" name="tgl_pengajuan"
                        class="form-control @error('tgl_pengajuan') is-invalid @enderror" id="staticEmail"
                        style="border: 1px solid rgb(139, 139, 139)" value="{{ old('tgl_pengajuan') }}" required>
                    @error('tgl_pengajuan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="imgrumah" class="form-label">Foto Rumah</label>
                <input class="form-control" type="file" @error('imgrumah') is-invalid @enderror id="image"
                    name="imgrumah">
                @error('imgrumah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="imgnasabah" class="form-label">Foto Nasabah</label>
                <input class="form-control" type="file" @error('imgnasabah') is-invalid @enderror id="imgnasabah"
                    name="imgnasabah">
                @error('imgnasabah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="imgjaminan" class="form-label">Foto Jaminan</label>
                <input class="form-control" type="file" @error('imgjaminan') is-invalid @enderror id="imgjaminan"
                    name="imgjaminan">
                @error('imgjaminan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="imgktp" class="form-label">Foto KTP</label>
                <input class="form-control" type="file" @error('imgktp') is-invalid @enderror id="imgktp"
                    name="imgktp">
                @error('imgktp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="imgkk" class="form-label">Foto Kartu Keluarga</label>
                <input class="form-control" type="file" @error('imgkk') is-invalid @enderror id="imgkk"
                    name="imgkk">
                @error('imgkk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
