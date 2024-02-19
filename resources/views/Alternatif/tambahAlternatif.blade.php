@extends('/layout.main')
@section('content')
    {{-- Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informasi Referensi Penilaian Debitur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><b>Aspek Penilaian Character untuk nasabah baru</b><br>
                        1. Kehidupan beragama debitur baik <br>
                        2. Memiliki pengalaman berhutang sebelumnya <br>
                        3. Tidak memiliki catatan kriminal<br>
                        4. Memiliki etos kerja yang tinggi <br>
                        5. Gaya hidup yang tidak berlebihan <br>
                        6. Berkelakuan Baik Dimasyarakat <br>
                        Apabila memenuhi minimal 4 dari penilaian tersebut maka dinilai berkelakuan baik dan apabila kurang
                        dari 4 dinilai berkelakuan kurang baik
                    </p>
                    <p><b>Aspek Penilaian Capacity</b><br>
                        Aspek penilaian capacity dilihat dari hasil perhitungan kemampuan mencicil usulan pinjaman yang
                        diajukan debitur
                    </p>
                    <p><b>Aspek Penilaian Capital</b><br>
                        Laporan keuangan dikatakan layak apabila memenuhi syarat pengumpulan data dari perusahaan
                        seperti slip gaji yang valid dan besaran modal yang dimiliki
                    </p>
                    <p><b>Aspek Penilaian Condition</b><br>
                        1. Permintaan pasar terhadap jasa/barang yang tinggi<br>
                        2. Kelancaran usaha tidak terlalu dipengaruhi kondisi ekonomi negara.<br>
                        3. Lokasi usaha yang strategis<br>
                        4. Usaha tidak dilarang oleh pemerintah<br>
                        5. Jumlah usaha serupa disekitar tidak banyak<br>
                        <b>Penentuan nilai condition debitur</b><br>
                        1. Memiliki keberlanjutan yang sangat baik = Memenuhi seluruh aspek penilaian<br>
                        2. Memiliki keberlanjutan yang baik = Memenuhi hanya 4 dari aspek penilaian<br>
                        3. Memiliki keberlanjutan yang cukup = Memenuhi hanya 3 dari aspek penilaian<br>
                        4. Memiliki keberlanjutan yang kurang = Memenuhi hanya 2 dari aspek penilaian<br>
                        5. Memiliki keberlanjutan yang sangat kurang = Memenuhi hanya 1 atau tidak sama sekali dari
                        aspek penilaian<br>
                    </p>
                    <p><b>Aspek Penilaian Collateral</b><br>
                        Penilaian Agunan dilakukan dengan survei lokasi dan menilai apakah nilai agunan rata-rata naik/turun
                        setiap tahunnya dan kondisi kepemilikan agunan
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container"
        style="margin-top: -2em; border: 1px solid rgb(190, 190, 190); border-radius: 10px; box-shadow: 2px 3px #888888">
        <div class="d-flex inline my-4">
            <h2 class="my-auto">{{ $title }}</h2>
            <i class="fa fa-info-circle my-auto ml-2" style="font-size:20px" data-bs-toggle="modal"
                data-bs-target="#exampleModal"></i>
        </div>
        <div id="data-container" class="">

        </div>
        <form method="POST" action="/alternatif">
            @csrf
            <input type="hidden" id="id_periode" name="id_periode" value="{{ $periode }}">
            <div class="mb-4 row">
                <label class="col-sm-4 col-form-label">Nama Calon Debitur <span class="red">*</span></label>
                <div class="row">
                    <div class="col-sm-6">
                        <select name="pemohon_id" class="form-select @error('pemohon_id') is-invalid @enderror"
                            id="pemohon_id" aria-describedby="pemohon_idFeedback" required>
                            <option value="">--Pilih--</option>
                            @foreach ($pemohon as $p)
                                @if (
                                    $kondisi
                                        ::where('pemohon_id', $p->id)->where('id_periode', $periode)->first() == null)
                                    <option value="{{ $p->id }}">
                                        {{ $p->id }} ~ {{ $p->nama }}
                                @endif
                            @endforeach
                        </select>
                        @error('pemohon_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-4 row">
                <?php $a = 1; ?>
                <label class="col-sm-4 col-form-label">(<b>Character</b>) Nasabah baru/lama? Bagaimana Karakter
                    Nasabah?<span class="red">*</span></label>
                <div class="row">
                    <div class="col-sm-12">
                        <input type="hidden" name="kriteria_id[]" value="1">
                        <select name="nilai_id[]" class="form-select @error('nilai_id') is-invalid @enderror"
                            id="validationServer04" aria-describedby="validationServer04Feedback" required>
                            <option value="">--Pilih--</option>
                            @foreach ($nilai as $kr)
                                @if ($kr->kriteria_id == '1')
                                    <option value="{{ $kr->id }}">
                                        {{ $a }}. {{ $kr->deskripsi }}
                                    </option>
                                    <?php $a++; ?>
                                @endif
                            @endforeach
                        </select>
                        @error('nilai_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-4 row">
                <?php $b = 1; ?>
                <label class="col-sm-4 col-form-label">(<b>Capacity</b>) Apakah Debitur memiliki kemampuan melunasi pinjaman
                    yang diusulkan?<span class="red">*</span></label>
                <div class="row">
                    <div class="col-sm-12">
                        <input type="hidden" name="kriteria_id[]" value="2">
                        <select name="nilai_id[]" class="form-select @error('nilai_id') is-invalid @enderror"
                            id="validationServer04" aria-describedby="validationServer04Feedback" required>
                            <option value="">--Pilih--</option>
                            @foreach ($nilai as $n)
                                @if ($n->kriteria_id == '2')
                                    <option value="{{ $n->id }}">
                                        {{ $b }}. {{ $n->deskripsi }}
                                    </option>
                                    <?php $b++; ?>
                                @endif
                            @endforeach
                        </select>
                        @error('nilai_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-4 row">
                <?php $c = 1; ?>
                <label class="col-sm-4 col-form-label">(<b>Capital</b>) Bagaimana Kondisi Laporan Keuangan Debitur?
                    <span class="red">*</span></label>
                <div class="row">
                    <div class="col-sm-12">
                        <input type="hidden" name="kriteria_id[]" value="3">
                        <select name="nilai_id[]" class="form-select @error('nilai_id') is-invalid @enderror"
                            id="validationServer04" aria-describedby="validationServer04Feedback" required>
                            <option value="">--Pilih--</option>
                            @foreach ($nilai as $n)
                                @if ($n->kriteria_id == '3')
                                    <option value="{{ $n->id }}">
                                        {{ $c }}. {{ $n->deskripsi }}</option>
                                    <?php $c++; ?>
                                @endif
                            @endforeach
                        </select>
                        @error('nilai_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-4 row">
                <?php $d = 1; ?>
                <label class="col-sm-4 col-form-label">(<b>Condition</b>) Bagaimana Keberlanjutan Usaha Debitur
                    Kedepannya?<span class="red">*</span></label>
                <div class="row">
                    <div class="col-sm-12">
                        <input type="hidden" name="kriteria_id[]" value="4">
                        <select name="nilai_id[]" class="form-select @error('nilai_id') is-invalid @enderror"
                            id="validationServer04" aria-describedby="validationServer04Feedback" required>
                            <option value="">--Pilih--</option>
                            @foreach ($nilai as $n)
                                @if ($n->kriteria_id == '4')
                                    <option value="{{ $n->id }}">
                                        {{ $d }}. {{ $n->deskripsi }}</option>
                                    <?php $d++; ?>
                                @endif
                            @endforeach
                        </select>
                        @error('nilai_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-4 row">
                <?php $e = 1; ?>
                <label class="col-sm-4 col-form-label">(<b>Collateral</b>) Bagaimana Status Jaminan Yang Diajukan? <span
                        class="red">*</span></label>
                <div class="row">
                    <div class="col-sm-12">
                        <input type="hidden" name="kriteria_id[]" value="5">
                        <select name="nilai_id[]" class="form-select @error('nilai_id') is-invalid @enderror"
                            id="validationServer04" aria-describedby="validationServer04Feedback" required>
                            <option value="">--Pilih--</option>
                            @foreach ($nilai as $n)
                                @if ($n->kriteria_id == '5')
                                    <option value="{{ $n->id }}">
                                        {{ $e }}. {{ $n->deskripsi }}</option>
                                    <?php $e++; ?>
                                @endif
                            @endforeach
                        </select>
                        @error('nilai_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-4 d-flex justify-content-center">
                <button type="submit" style="width: 40%" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
