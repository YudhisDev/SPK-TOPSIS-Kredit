@extends('layout.main')
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
    <div class="container">
        <h2 class="mb-4">Biodata Calon Debitur</h2>
        @if (session()->has('success'))
            <div class="alert alert-primary" role="alert">
                {{ session('success') }}
            </div>
        @elseif(session()->has('delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('delete') }}
            </div>
        @endif
        <div>
            @if ($pemohon->imgnasabah)
                <div>
                    <img style="display: block; margin-left: auto; margin-right: auto;"
                        src="{{ asset('storage/' . $pemohon->imgnasabah) }}" alt="">
                </div>
            @else
                <img style="display: block; margin-left: auto; margin-right: auto;"
                    src="<?= asset('images/default_img.jpg') ?>" alt="image">
            @endif

        </div>
        <a class="btn btn-outline-warning" href="/pemohon">KEMBALI </a>
        <a href="/pemohon/{{ $pemohon->id }}/edit" class="btn btn-outline-success" role="button">Edit Data</a>
        <table class="table mt-4">
            <tbody>
                <tr>
                    <td class="width">Nama</td>
                    <td>{{ $pemohon->nama }}</td>
                </tr>
                <tr>
                    <td>Nomor KTP</td>
                    <td>{{ $pemohon->no_ktp }}</td>
                </tr>
                <tr>
                    <td>Nomor Telepon</td>
                    <td>{{ $pemohon->no_hp }}</td>
                </tr>
                <tr>
                    <td>Nama Pasangan</td>
                    <td>{{ $pemohon->nama_pasangan }}</td>
                </tr>
                <tr>
                    <td>Nama Ibu</td>
                    <td>{{ $pemohon->nama_ibu }}</td>
                </tr>
                <tr>
                    <td>Status Nasabah</td>
                    <td>{{ $pemohon->status_nasabah }}</td>
                </tr>
                <tr>
                    <td>Alamat Tempat Tinggal</td>
                    <td>{{ $pemohon->alamat_rumah }}</td>
                </tr>
                <tr>
                    <td>Jenis Usaha</td>
                    <td>{{ $pemohon->jenis_usaha }}</td>
                </tr>
                <tr>
                    <td>Lama Usaha</td>
                    <td>{{ $pemohon->lama_usaha }}</td>
                </tr>
                <tr>
                    <td>Lokasi Usaha</td>
                    <td>{{ $pemohon->lokasi_usaha }}</td>
                </tr>
                <tr>
                    <td>Lama Menetap Dilokasi Usaha</td>
                    <td>{{ $pemohon->lama_usaha }}</td>
                </tr>
                <tr>
                    <td>Keperluan Mengajukan Pinjaman</td>
                    <td>{{ $pemohon->keperluan }}</td>
                </tr>

                <td>Tanggal Pengajuan Pinjaman</td>
                <td>{{ $pemohon->tgl_pengajuan }}</td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <tbody>
                <tr>
                    <th>Penjelasan</th>
                    <th>Lampiran Gambar</th>
                </tr>
                <tr>
                    <th>Foto Rumah</th>
                    <td>
                        @if ($pemohon->imgrumah)
                            <div>
                                <img src="{{ asset('storage/' . $pemohon->imgrumah) }}" alt="">
                            </div>
                        @else
                            <img src="<?= asset('images/default_img.jpg') ?>" alt="image">
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Foto Jaminan</th>
                    <td>
                        @if ($pemohon->imgjaminan)
                            <div>
                                <img src="{{ asset('storage/' . $pemohon->imgjaminan) }}" alt="">
                            </div>
                        @else
                            <img src="<?= asset('images/default_img.jpg') ?>" alt="image">
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Foto Kartu Tanda Penduduk</th>
                    <td>
                        @if ($pemohon->imgktp)
                            <div>
                                <img src="{{ asset('storage/' . $pemohon->imgktp) }}" alt="">
                            </div>
                        @else
                            <img src="<?= asset('images/default_img.jpg') ?>" alt="image">
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Foto Kartu Keluarga</th>
                    <td>
                        @if ($pemohon->imgkk)
                            <div>
                                <img src="{{ asset('storage/' . $pemohon->imgkk) }}" alt="">
                            </div>
                        @else
                            <img src="<?= asset('images/default_img.jpg') ?>" alt="image">
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
