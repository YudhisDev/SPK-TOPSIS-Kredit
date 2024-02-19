@extends('/layout.main')
@section('content')
    <div class="container"
        style="margin-top: -2em; border: 1px solid rgb(190, 190, 190); border-radius: 10px; box-shadow: 2px 3px #888888">
        <h2 class="mb-4 mt-2">{{ $title }}</h2>
        {{-- {{ dd($alternatif) }} --}}
        <form method="POST" action="/pinjaman">
            @csrf
            <input type="text" name="id_periode" value="{{ $id_periode }}" hidden>
            <div class="mb-4 row">
                <label class="col-sm-2 col-form-label">Id Kreditur <span class="red">*</span></label>
                <div class="col-sm-5">
                    <select name="id_pemohon" class="form-select @error('id_pemohon') is-invalid @enderror" id="id_pemohon"
                        aria-describedby="id_pemohonFeedback" required>
                        <option value="">--Pilih--</option>
                        @foreach ($pemohon as $p)
                            @if ($isAdmin == true)
                                {{-- @if ($kondisi::where('id_pemohon', $p->id)->first() == null) --}}
                                <option value="{{ $p->id }}">
                                    {{ $p->id }} ~ {{ $p->nama }}
                                    {{-- @endif --}}
                                </option>
                            @elseif($isAdmin == false && $p->id_user == $user)
                                {{-- $kondisi::where('id_pemohon', $p->id)->first() == null && --}}
                                <option value="{{ $p->id }}">
                                    {{ $p->id }} ~ {{ $p->nama }}
                                    {{-- @endif --}}
                                </option>
                            @endif
                        @endforeach
                        {{-- @foreach ($pemohon as $p)
                            <option value="{{ $p->id }}" {{ old('id_pemohon') == 1 ? 'selected' : '' }}>
                                {{ $p->id }} ~ {{ $p->nama }}</option>
                        @endforeach --}}
                    </select>
                    @error('id_pemohon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-2 col-form-label">Pinjaman <span class="red">*</span></label>
                <div class="col-sm-5">
                    <input type="text" id="pinjaman" name="pinjaman"
                        class="form-control @error('pinjaman') is-invalid @enderror"
                        style="border: 1px solid rgb(139, 139, 139)">
                    @error('pinjaman')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-2 col-form-label">Gaji Rata-rata Perbulan <span class="red">*</span></label>
                <div class="col-sm-5">
                    <input type="text" id="gaji" name="gaji_kotor"
                        class="form-control @error('gaji_kotor') is-invalid @enderror"
                        style="border: 1px solid rgb(139, 139, 139)">
                    @error('gaji_kotor')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-2 col-form-label">Pengeluaran Usaha <span class="red">*</span></label>
                <div class="col-sm-5">
                    <input type="text" id="usaha" name="usaha"
                        class="form-control  @error('usaha') is-invalid @enderror"
                        style="border: 1px solid rgb(139, 139, 139)" placeholder="jika tidak ada masukan 0">
                    @error('usaha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-2 col-form-label">Pengeluaran Rumah Tangga <span class="red">*</span></label>
                <div class="col-sm-5">
                    <input type="text" id="rumah" name="rumah_tangga"
                        class="form-control  @error('rumah_tangga') is-invalid @enderror"
                        style="border: 1px solid rgb(139, 139, 139)" placeholder="jika tidak ada masukan 0">
                    @error('rumah_tangga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-2 col-form-label">Pengeluaran lainnya <span class="red">*</span></label>
                <div class="col-sm-5">
                    <input type="text" id="lain" name="lain_lain"
                        class="form-control  @error('lain_lain') is-invalid @enderror"
                        style="border: 1px solid rgb(139, 139, 139)" placeholder="jika tidak ada masukan 0">
                    @error('lain_lain')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-2 col-form-label">Simpanan Wajib <span class="red">*</span></label>
                <div class="col-sm-5">
                    <input type="text" id="simpanan" name="simpanan_wajib"
                        class="form-control  @error('simpanan_wajib') is-invalid @enderror" id="staticEmail"
                        style="border: 1px solid rgb(139, 139, 139)" placeholder="jika tidak ada masukan 0">
                    @error('simpanan_wajib')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-2 col-form-label">Bunga Pinjaman<span class="red">*</span></label>
                <div class="input-group col-sm-4">
                    <input type="text" name="bunga" class="form-control @error('bunga') is-invalid @enderror"
                        style="border: 1px solid rgb(139, 139, 139)" placeholder="angka desimal menggunakan (.)">
                    <span class="input-group-text">%</span>
                </div>
                @error('bunga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4 row">
                <label class="col-sm-2 col-form-label">Lama Durasi Pinjaman<span class="red">*</span></label>
                <div class="col-sm-3">
                    <input type="text" name="waktu" class="form-control  @error('waktu') is-invalid @enderror"
                        style="border: 1px solid rgb(139, 139, 139)" placeholder="Masukkan angka">
                    @error('waktu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-2 col-form-label">Pola Angsuran<span class="red">*</span></label>
                <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kurung_waktu" value="bulan"
                            @if (old('kurung_waktu') == 'bulan') checked @endif>
                        <label class="form-check-label">
                            Bulanan
                        </label>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kurung_waktu" value="minggu"
                            @if (old('kurung_waktu') == 'minggu') checked @endif>
                        <label class="form-check-label">
                            Mingguan
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Tanggal Pengajuan <span class="red">*</span></label>
                <div class="col-sm-6">
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
            <div class="mb-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
