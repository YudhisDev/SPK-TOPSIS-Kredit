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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex inline my-2">
        <h2 class="my-auto">{{ $title }} {{ $kriteria->namaKriteria }}</h2>
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
    {{-- {{ dd($subkriteria->first()->nama) }} --}}
    <div class="d-flex justify-content-end">
        <a href="/nilai/make/{{ $id_kriteria }}" class="btn btn-outline-primary mb-2 ml-5">Tambah
            Penilaian</a>
    </div>
    <table id="myTable" style="color: rgb(73, 73, 73);">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Id</th>
                <th scope="col">Kriteria</th>
                <th scope="col" style="width: 40%">Keterangan</th>
                <th scope="col">Nilai</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @php $n = 1; @endphp
            @foreach ($nilai as $sk)
                <tr>
                    <th scope="row">{{ $n++ }}</th>
                    <td>{{ $sk->id }}</td>
                    <td>{{ $sk->kriteria->namaKriteria }}</td>
                    <td>{{ $sk->deskripsi }}</td>
                    <td>{{ $sk->nilai }}</td>
                    <td>
                        <a class="btn btn-outline-success" href="/nilai/{{ $sk->id }}/edit" role="button">Update</a>
                        <form action="/nilai/{{ $sk->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-outline-danger"
                                onclick="return confirm('Anda yakin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
