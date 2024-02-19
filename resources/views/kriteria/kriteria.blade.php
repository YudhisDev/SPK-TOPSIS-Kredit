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
                    <p>5 = Sangat Penting</p>
                    <p>4 = Penting</p>
                    <p>3 = Cukup Penting</p>
                    <p>2 = Kurang Penting</p>
                    <p>1 = Sangat Kurang Penting</p>
                    <br>
                    <b>Penjelasan Kriteria</b>
                    <p><b>Character = </b>Menilai Karakter Nasabah Pada Faktor Riwayat Pinjaman atau Kehidupan Pribadi</p>
                    <p><b>Capacity = </b>Menilai Kemampuan Nasabah Dalam Mencicil Pinjaman Yang Diajukan</p>
                    <p><b>Capital = </b>Menilai Modal dan Laporan Keuangan Nasabah</p>
                    <p><b>Condition = </b>Menilai Kondisi Ekonomi Nasabah Saat Ini Maupun yang Akan Datang</p>
                    <p><b>Collateral = </b>Menilai Agunan Yang Diserahkan Nasabah</p>
                    <br>
                    <p><b>Penjelasan Benefit dan Cost</b></p>
                    <p>Benefit: Semakin tinggi nilai, semakin tinggi skor yang didapatkan</p>
                    <p>Cost: Semakin rendah nilai, semakin tinggi skor yang didapatkan</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex inline my-2">
        <h2 class="my-auto">Kriteria</h2>
        <i class="fa fa-info-circle my-auto ml-2" style="font-size:20px" data-bs-toggle="modal"
            data-bs-target="#exampleModal"></i>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-primary" role="alert">
            {{ session('success') }}
        </div>
    @elseif(session()->has('delete'))
        <div class="alert alert-danger" role="alert">
            {{ session('delete') }}
        </div>
    @endif
    <table id="myTable" style="color: rgb(73, 73, 73);">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Id kriteria</th>
                <th scope="col">Nama kriteria</th>
                <th scope="col">Nilai Bobot</th>
                <th scope="col">Benefit/Cost</th>
                <th scope="col">Detail Subkriteria</th>
            </tr>
        </thead>
        <tbody>
            @php $n = 1; @endphp
            @foreach ($kriteria as $k)
                <tr>
                    <th scope="row">{{ $n++ }}</th>
                    <td>{{ $k->id }}</td>
                    <td>{{ $k->namaKriteria }}</td>
                    <td>{{ $k->nilaiBobot }}</td>
                    <td>{{ $k->jenis }}</td>
                    <td>
                        <a href="/kriteria/{{ $k->id }}/edit" class="btn btn-outline-success"
                            role="button">Update</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if ($count == null)
        <?= '' ?>
    @else
        <h5 class="mt-3">Bobot Rata-rata Kriteria Berdasarkan Kuesioner</h5>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Character</th>
                    <th scope="col">Capital</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Collateral</th>
                    <th scope="col">Condition</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    @foreach ($kuesioner as $k)
                        <td>{{ $k }}</td>
                    @endforeach
                    <td><a href="kriteria/update" class="btn btn-outline-success" role="button">Gunakan</a></td>
                </tr>
            </tbody>
        </table>
    @endif
@endsection
