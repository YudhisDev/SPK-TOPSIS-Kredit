@extends('/layout.main')
<style>
    .width {
        width: 30%;
    }

    img {
        height: 240;
    }

    table tr th {
        text-align: center;
    }
</style>
@section('content')
    <div class="container"
        style="margin-top : -2em; border: 1px solid rgb(190, 190, 190); border-radius: 10px; box-shadow: 2px 3px #888888">
        <h2 class="mb-5">{{ $title }}</h2>
        <form class="needs-validation" method="POST" action="/pemohon/{{ $post->id }}" enctype="multipart/form-data"
            novalidate>
            @csrf
            @method('PUT')
            <input type="hidden" name="id" class="form-control" value="{{ $post->id }}">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nama Kreditur <span class="red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control  @error('nama') is-invalid @enderror"
                        id="staticEmail" style="border: 1px solid rgb(139, 139, 139)" value="{{ old('nama', $post->nama) }}"
                        autofocus>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">No KTP <span class="red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" name="no_ktp" class="form-control @error('no_ktp') is-invalid @enderror"
                        id="staticEmail" style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('no_ktp', $post->no_ktp) }}">
                    @error('no_ktp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">No Telepon</label>
                <div class="col-sm-3">
                    <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
                        id="staticEmail" style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('no_hp', $post->no_hp) }}">
                    @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nama Pasangan</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_pasangan"
                        class="form-control @error('nama_pasangan') is-invalid @enderror" id="staticEmail"
                        style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('nama_pasangan', $post->nama_pasangan) }}">
                    @error('nama_pasangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nama Ibu<span class="red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" name="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror"
                        id="staticEmail" style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('nama_ibu', $post->nama_ibu) }}">
                    @error('nama_ibu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Status Nasabah<span class="red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" name="status_nasabah"
                        class="form-control @error('status_nasabah') is-invalid @enderror" id="staticEmail"
                        style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('status_nasabah', $post->status_nasabah) }}">
                    @error('status_nasabah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Alamat Rumah Nasabah<span class="red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" name="alamat_rumah"
                        class="form-control @error('alamat_rumah') is-invalid @enderror" id="staticEmail"
                        style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('alamat_rumah', $post->alamat_rumah) }}">
                    @error('alamat_rumah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Jenis Usaha Nasabah<span class="red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" name="jenis_usaha" class="form-control @error('jenis_usaha') is-invalid @enderror"
                        id="staticEmail" style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('jenis_usaha', $post->jenis_usaha) }}">
                    @error('jenis_usaha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Lama Usaha Nasabah</label>
                <div class="col-sm-10">
                    <input type="text" name="lama_usaha"
                        class="form-control @error('lama_usaha') is-invalid @enderror" id="staticEmail"
                        style="border: 1px solid rgb(139, 139, 139)" value="{{ old('lama_usaha', $post->lama_usaha) }}">
                    @error('lama_usaha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Lokasi Usaha Nasabah</label>
                <div class="col-sm-10">
                    <input type="text" name="lokasi_usaha"
                        class="form-control @error('lokasi_usaha') is-invalid @enderror" id="staticEmail"
                        style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('lokasi_usaha', $post->lokasi_usaha) }}">
                    @error('lokasi_usaha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Lama Menetap Dilokasi Usaha</label>
                <div class="col-sm-10">
                    <input type="text" name="lama_menetap"
                        class="form-control @error('lama_menetap') is-invalid @enderror" id="staticEmail"
                        style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('lama_menetap', $post->lama_menetap) }}">
                    @error('lama_menetap')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Keperluan Pinjaman<span class="red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" name="keperluan" class="form-control @error('keperluan') is-invalid @enderror"
                        id="staticEmail" style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('keperluan', $post->keperluan) }}">
                    @error('keperluan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Tanggal Pengajuan <span class="red">*</span></label>
                <div class="col-sm-6">
                    <input type="date" name="tgl_pengajuan"
                        class="form-control @error('tgl_pengajuan') is-invalid @enderror" id="staticEmail"
                        style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('tgl_pengajuan', $post->tgl_pengajuan) }}">
                    @error('tgl_pengajuan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="imgrumah" class="form-label">Foto Rumah</label>
                <input type="hidden" name="oldrumah" value="{{ $post->imgrumah }}">
                @if ($post->imgrumah)
                    <div class="mb-1">
                        <img src="{{ asset('storage/' . $post->imgrumah) }}" alt="">
                    </div>
                @else
                    <div class="mb-1"><img src="<?= asset('images/default_img.jpg') ?>" alt="image"></div>
                @endif
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
                <input type="hidden" name="oldnasabah" value="{{ $post->imgnasabah }}">
                @if ($post->imgnasabah)
                    <div class="mb-1">
                        <img src="{{ asset('storage/' . $post->imgnasabah) }}" alt="">
                    </div>
                @else
                    <div class="mb-1"><img src="<?= asset('images/default_img.jpg') ?>" alt="image"></div>
                @endif
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
                <input type="hidden" name="oldjaminan" value="{{ $post->imgjaminan }}">
                @if ($post->imgjaminan)
                    <div class="mb-1">
                        <img src="{{ asset('storage/' . $post->imgjaminan) }}" alt="">
                    </div>
                @else
                    <div class="mb-1"><img src="<?= asset('images/default_img.jpg') ?>" alt="image"></div>
                @endif
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
                <input type="hidden" name="oldktp" value="{{ $post->imgktp }}">
                @if ($post->imgktp)
                    <div class="mb-1">
                        <img src="{{ asset('storage/' . $post->imgktp) }}" alt="">
                    </div>
                @else
                    <div class="mb-1"><img src="<?= asset('images/default_img.jpg') ?>" alt="image"></div>
                @endif
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
                <input type="hidden" name="oldkk" value="{{ $post->imgkk }}">
                @if ($post->imgkk)
                    <div class="mb-1">
                        <img src="{{ asset('storage/' . $post->imgkk) }}" alt="">
                    </div>
                @else
                    <div class="mb-1"><img src="<?= asset('images/default_img.jpg') ?>" alt="image"></div>
                @endif
                <input class="form-control" type="file" @error('imgkk') is-invalid @enderror id="imgkk"
                    name="imgkk">
                @error('imgkk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update data</button>
            </div>
        </form>
    </div>
@endsection
