@extends('layout.main')
@section('content')
    <h2 class="mb-4">Daftar Pinjaman Periode {{ $periode->periode }}</h2>
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
        <a href="/pinjaman/tambah/{{ $id_periode }}" class="btn btn-outline-primary mb-2 ml-5">Tambah Pinjaman</a>
    </div>
    <table id="myTable" style="color: rgb(73, 73, 73);">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kreditur</th>
                <th scope="col">Pinjaman</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Penanggung Jawab</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $n = 1;
            @endphp
            @foreach ($gaji as $pinjaman)
                @php
                    //gaji bersih
                    $gajibersih = $pinjaman->gaji_kotor - ($pinjaman->usaha + $pinjaman->rumah_tangga + $pinjaman->lain_lain);
                    // normalisasi (75% dari gaji bersih)
                    $normalisasi = $gajibersih * (75 / 100);
                    // rekomendasi pengajuan besar pinjaman //
                    $a = (100 + $pinjaman->bunga * $pinjaman->waktu) / 100;
                    $rekomendasi = ($normalisasi * $pinjaman->waktu) / $a;
                    //rekomen mingguan
                    $payment_minggu = $normalisasi / 4;
                    $rekomendasi_m = $payment_minggu * $pinjaman->waktu;
                    $total_angsuran = (($rekomendasi_m - $pinjaman->simpanan_wajib) * 100) / ($pinjaman->bunga + 100);
                @endphp
                <tr>
                    <td scope="row">{{ $n++ }}</td>
                    <td>{{ $pinjaman->pemohon->nama }}</td>
                    <td>@currency($pinjaman->pinjaman)</td>
                    @if ($pinjaman->kurung_waktu == 'bulan')
                        @if ($rekomendasi < $pinjaman->pinjaman)
                            <td><span class="badge bg-danger">Tidak Layak</span></td>
                        @else
                            <td> <span class="badge bg-primary">Layak</span> </td>
                        @endif
                    @else
                        @if ($total_angsuran < $pinjaman->pinjaman)
                            <td><span class="badge bg-danger">Tidak Layak</span></td>
                        @else
                            <td><span class="badge bg-primary">Layak</span> </td>
                        @endif
                    @endif
                    <td>{{ $pinjaman->user->name }}</td>
                    <td>{{ $pinjaman->tgl_pengajuan }}</td>
                    <td>
                        <a class="btn btn-outline-warning" href="/pdf/{{ $pinjaman->id }}" role="button">Cetak</a>
                        <a class="btn btn-outline-success" href="/pinjaman/{{ $pinjaman->id }}" role="button">Detail</a>
                        <form action="/pinjaman/{{ $pinjaman->id }}" method="POST" class="d-inline">
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
