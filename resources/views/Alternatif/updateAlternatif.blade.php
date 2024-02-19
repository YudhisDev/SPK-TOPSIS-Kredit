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
    <div class="container" style="border: 1px solid rgb(190, 190, 190); border-radius: 10px; box-shadow: 2px 3px #888888">
        <div class="d-flex inline my-4">
            <h2 class="my-auto">{{ $title }}</h2>
            <i class="fa fa-info-circle my-auto ml-2" style="font-size:20px" data-bs-toggle="modal"
                data-bs-target="#exampleModal"></i>
        </div>
        <form method="POST" action="/alternatif/{{ $alternatif->id }}" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <input type="hidden" name="id_periode" value="{{ $alternatif->id_periode }}">
            <div class="mb-4 row">
                <label class="col-sm-3 col-form-label">Nama Pemohon</label>
                <div class="col-sm-6">
                    <input type="text" name="pemohon_id" class="form-control" id="staticEmail"
                        style="border: 1px solid rgb(139, 139, 139)" value="{{ $alternatif->pemohon->nama }}" readonly>
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-3 col-form-label">Kriteria</label>
                <div class="col-sm-6">
                    <input type="text" name="kriteria_id" class="form-control" id="staticEmail"
                        style="border: 1px solid rgb(139, 139, 139)" value="{{ $alternatif->kriteria->namaKriteria }}"
                        readonly>
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-3 col-form-label">Penilaian Kriteria Debitur<span class="red">*</span></label>
                <div class="col-sm-6">
                    <select name="nilai_id" class="form-select @error('id_nilai') is-invalid @enderror" id="id_nilai"
                        aria-describedby="id_nilaiFeedback" required>
                        <option value="{{ $alternatif->nilai_id }}">{{ $alternatif->nilai->deskripsi }}</option>
                        @foreach ($nilai as $value)
                            <option value="{{ $value->id }}">
                                {{ $value->deskripsi }}
                        @endforeach
                    </select>
                    @error('id_nilai')
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
