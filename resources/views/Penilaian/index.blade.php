@extends('layout.main')
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informasi Bobot Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <b>Keterangan Nilai</b>
                    <p>5 = Sangat Baik</p>
                    <p>4 = Baik</p>
                    <p>3 = Cukup</p>
                    <p>2 = Kurang</p>
                    <p>1 = Sangat Kurang</p>
                    <br>
                    <b>Penjelasan Kriteria</b>
                    <b>Penjelasan Kriteria</b>
                    <p><b>Character = </b>Menilai Karakter Nasabah, Baik Dalam Kehidupan Pribadi Maupun Lingkungan</p>
                    <p><b>Capacity = </b>Menilai Kemampuan Nasabah Dalam Menjalankan Usaha Guna Memperoleh Laba yang
                        Diharapkan</p>
                    <p><b>Capital = </b>Menilai Modal Usaha Yang Sudah Dihasilkan Nasabah Selama Melakukan Usaha</p>
                    <p><b>Condition = </b>Menilai Kondisi Ekonomi Nasabah Saat Ini Maupun yang Akan Datang</p>
                    <p><b>Collateral = </b>Menilai Agunan Yang Diserahkan Nasabah</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex inline my-2">
        <h2 class="my-auto">{{ $title }}</h2>
        <i class="fa fa-info-circle my-auto ml-2" style="font-size:20px" data-bs-toggle="modal"
            data-bs-target="#exampleModal"></i>
    </div>
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-primary" role="alert">
                {{ session('success') }}
            </div>
        @elseif(session()->has('delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('delete') }}
            </div>
        @endif
        {{-- {{ dd($subkriteria->first()->nama) }} --}}
        <div class="d-flex justify-content-end">
            <a href="/nilai/create" class="btn btn-outline-primary mb-2 ml-5">Tambah
                Penilaian</a>
        </div>

        <div class="row">
            @foreach ($kriteria as $key)
                <div class="col-sm-4 mt-3">
                    <div class="card text-center" style="background-color:rgb(205, 205, 255)">
                        <div class="card-body">
                            <h5 class="card-title">Penilaian {{ $key->namaKriteria }}</h5>
                            <p class="card-text">Penilaian untuk kriteria {{ $key->namaKriteria }}</p>
                            <a href="nilaidetail/{{ $key->id }}" class="btn btn-primary">Detail
                                {{ $key->namaKriteria }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
