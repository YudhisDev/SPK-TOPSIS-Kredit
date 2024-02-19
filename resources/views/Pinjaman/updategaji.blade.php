@extends('/layout.main')
@section('content')
    @php
        function rupiah($angka)
        {
            $hasil_rupiah = number_format($angka, 0, '.', '.');
            return $hasil_rupiah;
        }
    @endphp
    <div class="container"
        style="width: 75%; border: 1px solid rgb(190, 190, 190); border-radius: 10px; box-shadow: 2px 3px #888888">
        <h2 class="mb-4 mt-2">{{ $title }}</h2>
        <form class="needs-validation" method="POST" action="/pinjaman/{{ $pemohon->id }}" novalidate>
            @csrf
            @method('PUT')
            <input type="hidden" name="id" class="form-control" value="{{ $pemohon->id }}">
            <input type="hidden" name="id_periode" class="form-control" value="{{ $pemohon->id_periode }}">

            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Nama Pemohon</label>
                <div class="col-sm-8">
                    <input type="text" name="pemohon_id" class="form-control" id="staticEmail"
                        style="border: 1px solid rgb(139, 139, 139)" value="{{ $pemohon->pemohon->nama }}" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Pengajuan Pinjaman <span class="red">*</span></label>
                <div class="col-sm-8">
                    <input type="text" id="pinjaman" name="pinjaman"
                        class="form-control @error('pinjaman') is-invalid @enderror" id="staticEmail"
                        style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('pinjaman', rupiah($pemohon->pinjaman)) }}">
                    @error('pinjaman')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Gaji Rata-rata Perbulan <span class="red">*</span></label>
                <div class="col-sm-8">
                    <input type="text" id="gaji" class="form-control @error('gaji_kotor') is-invalid @enderror"
                        name="gaji_kotor" style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('gaji_kotor', rupiah($pemohon->gaji_kotor)) }}">
                    @error('gaji_kotor')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Pengeluaran Usaha <span class="red">*</span></label>
                <div class="col-sm-8">
                    <input type="text" id="usaha" class="form-control @error('usaha') is-invalid @enderror"
                        name="usaha" style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('usaha', rupiah($pemohon->usaha)) }}">
                    @error('usaha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Pengeluaran Rumah Tangga <span class="red">*</span></label>
                <div class="col-sm-8">
                    <input type="text" id="rumah" class="form-control @error('rumah_tangga') is-invalid @enderror"
                        name="rumah_tangga" style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('rumah_tangga', rupiah($pemohon->rumah_tangga)) }}">
                    @error('rumah_tangga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Pengeluaran Lain-lain <span class="red">*</span></label>
                <div class="col-sm-8">
                    <input type="text" id="lain" class="form-control @error('lain_lain') is-invalid @enderror"
                        name="lain_lain" style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('lain_lain', rupiah($pemohon->lain_lain)) }}">
                    @error('lain_lain')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Simpanan Wajib <span class="red">*</span></label>
                <div class="col-sm-8">
                    <input type="text" id="simpanan" class="form-control @error('simpanan_wajib') is-invalid @enderror"
                        name="simpanan_wajib" style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('simpanan_wajib', rupiah($pemohon->simpanan_wajib)) }}">
                    @error('simpanan_wajib')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Bunga Pinjaman <span class="red">*</span></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('bunga') is-invalid @enderror" name="bunga"
                        style="border: 1px solid rgb(139, 139, 139)" value="{{ old('bunga', $pemohon->bunga) }}">
                    @error('bunga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Waktu Angsuran <span class="red">*</span></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('waktu') is-invalid @enderror" name="waktu"
                        style="border: 1px solid rgb(139, 139, 139)" value="{{ old('waktu', $pemohon->waktu) }}">
                    @error('waktu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Jenis Pinjaman <span class="red">*</span></label>
                <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kurung_waktu" value="bulan"
                            {{ $pemohon->kurung_waktu == 'bulan' ? 'checked' : '' }}>
                        <label class="form-check-label">
                            Bulanan
                        </label>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kurung_waktu" value="minggu"
                            {{ $pemohon->kurung_waktu == 'minggu' ? 'checked' : '' }}>
                        <label class="form-check-label">
                            Mingguan
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Tanggal Pengajuan <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="date" name="tgl_pengajuan"
                        class="form-control @error('tgl_pengajuan') is-invalid @enderror" id="staticEmail"
                        style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('tgl_pengajuan', $pemohon->tgl_pengajuan) }}">
                    @error('tgl_pengajuan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update data</button>
            </div>
        </form>
    </div>
@endsection
