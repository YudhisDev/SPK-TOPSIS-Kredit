@extends('layout.main')
@section('content')
    {{-- Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informasi Bobot Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <b>Penjelasan Penilaian</b>
                    <p><b>Character = </b>Menilai Karakter Nasabah, Baik Dalam Kehidupan Pribadi Maupun Lingkungan</p>
                    <p><b>Capacity = </b>Menilai Kemampuan Nasabah Dalam Mencicil pinjaman yang diusulkan</p>
                    <p><b>Capital = </b>Menilai Laporan Keuangan dan modal yang dikumpulkan debitur</p>
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
        <h2 class="my-auto">Daftar Penilaian Debitur</h2>
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
    <div class="d-flex justify-content-end">
        <a href="/alternatif/tambah/{{ $id_periode }}" class="btn btn-outline-primary mb-2 ml-5">Tambah Alternatif</a>
    </div>
    <table id="myTable" style="color: rgb(73, 73, 73);">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Debitur</th>
                @foreach ($data->unique('kriteria_id') as $item)
                    <th>{{ $item->kriteria->namaKriteria }}</th>
                @endforeach
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $n = 1;
                // dd($data);
            @endphp
            @foreach ($data->unique('pemohon_id') as $item)
                <tr>
                    <td style="vertical-align: top;">{{ $n++ }}</td>
                    <td style="vertical-align: top;">{{ $item->pemohon->nama }}</td>
                    @foreach ($data->where('pemohon_id', $item->pemohon_id) as $value)
                        <td style="vertical-align: top;">
                            <span class="mr-2">
                                @if ($value->nilai_id != null)
                                    {{ $value->nilai->deskripsi }}
                                @endif
                            </span>
                            <a href="/alternatif/{{ $value->id }}/edit" class="fa fa-edit my-auto ml-2"
                                style="font-size:20px;"></a>
                        </td>
                    @endforeach
                    <td style="vertical-align: top;">
                        <form action="/alternatif/{{ $item->pemohon_id }}/{{ $item->id_periode }}" method="POST"
                            class="d-inline">
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
    <div class="d-grid gap-2 col-6 mx-auto">
        <a href="/hasil/{{ $id_periode }}" class="btn btn-outline-success mb-2 ml-5">Hasil Perhitungan
            Alternatif</a>
    </div>
@endsection
