@extends('layout.main')
@section('content')
    <div class="container">
        <h2 class="mb-4">Detail Keuangan Debitur</h2>
        @if (session()->has('success'))
            <div class="alert alert-primary" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @php
            //PERBULAN
            //gaji bersih
            $gajibersih = $pemohon->gaji_kotor - ($pemohon->usaha + $pemohon->rumah_tangga + $pemohon->lain_lain);
            // normalisasi (75% dari gaji bersih)
            $normalisasi = $gajibersih * (75 / 100);
            //angsuran pokok(1)
            $angsuran_pokok = ($pemohon->pinjaman + $pemohon->simpanan_wajib) / $pemohon->waktu;
            //angsuran bunga
            $angsuran_bunga = ($pemohon->pinjaman * $pemohon->bunga) / 100;
            // total angsuran
            $angsuran_total = $angsuran_pokok + $angsuran_bunga;
            // total yang harus dilunasi
            $hutang = $angsuran_total * $pemohon->waktu;
            // Rekomendasi pinjaman maksimal
            $a = (100 + $pemohon->bunga * $pemohon->waktu) / 100;
            // dd($a);
            $rekomendasi = ($normalisasi * $pemohon->waktu) / $a;
            // dd($rekomendasi);
            // $rekomendasi = $normalisasi * $pemohon->waktu;

            //PERMINGGU
            $total_angsuran = ($pemohon->pinjaman * ($pemohon->bunga + 100)) / 100 + $pemohon->simpanan_wajib;
            $rpc_minggu = $normalisasi / 4;
            $angsuran_perminggu = $total_angsuran / $pemohon->waktu;
            $angsuran_bungam = $angsuran_perminggu - $angsuran_pokok;
            $rekomendasi_m = $rpc_minggu * $pemohon->waktu;
            $rekomendasi_minggu = (($rekomendasi_m - $pemohon->simpanan_wajib) * 100) / ($pemohon->bunga + 100);
        @endphp
        <a href="/pinjaman/{{ $pemohon->id }}/edit" class="btn btn-outline-success" role="button">Edit Data</a>
        <a class="btn btn-outline-warning" href="/pdf/{{ $pemohon->id }}" role="button">Cetak</a>
        <table class="table mt-4 table-hover">
            <tbody>
                <tr>
                    <td class="width">Id Pinjaman</td>
                    <td>{{ $pemohon->id }}</td>
                </tr>
                <tr>
                    <td class="width">Nama Pemohon</td>
                    <td>{{ $pemohon->pemohon->nama }}</td>
                </tr>
                <tr>
                    <td>Pengajuan Pinjaman</td>
                    <td>@currency($pemohon->pinjaman)</td>
                </tr>
                <tr>
                    <td>Besar Bunga</td>
                    <td>{{ $pemohon->bunga }} %</td>
                </tr>
                <tr>
                    <td>Simpanan Wajib</td>
                    <td>@currency($pemohon->simpanan_wajib)</td>
                </tr>
                <tr>
                    <td>Lama Angsuran</td>
                    <td>{{ $pemohon->waktu . ' ' . $pemohon->kurung_waktu }}</td>
                </tr>
                <tr>
                    <td>Gaji Rata-rata Perbulan</td>
                    <td>@currency($pemohon->gaji_kotor)</td>
                </tr>
                <tr>
                    <td>Pengeluaran Usaha</td>
                    <td>@currency($pemohon->usaha)</td>
                </tr>
                <tr>
                    <td>Pengeluaran Rumah Tangga</td>
                    <td>@currency($pemohon->rumah_tangga)</td>
                </tr>
                <tr>
                    <td>Pengeluaran Lainnya</td>
                    <td>@currency($pemohon->lain_lain)</td>
                </tr>
                <tr>
                    <td>Gaji Bersih</td>
                    <td>@currency($gajibersih)</td>
                </tr>
                <tr>
                    <td>RPC {{ 'Per' . $pemohon->kurung_waktu }}</td>
                    @if ($pemohon->kurung_waktu == 'minggu')
                        <td>@currency($rpc_minggu)</td>
                    @else
                        <td>@currency($normalisasi)</td>
                    @endif
                </tr>
                <tr>
                    <td>Angsuran Pokok</td>
                    <td>@currency($angsuran_pokok)</td>
                </tr>
                <tr>
                    <td>Angsuran Bunga</td>
                    @if ($pemohon->kurung_waktu == 'minggu')
                        <td>@currency(ceil($angsuran_bungam))</td>
                    @else
                        <td>@currency(ceil($angsuran_bunga))</td>
                    @endif
                </tr>
                <tr>
                    <td>Angsuran {{ 'per' . $pemohon->kurung_waktu }}</td>
                    @if ($pemohon->kurung_waktu == 'minggu')
                        <td>@currency(ceil($angsuran_perminggu))</td>
                    @else
                        <td>@currency(ceil($angsuran_total))</td>
                    @endif
                </tr>
                <tr>
                    <td>Total Pinjaman (bunga)</td>
                    @if ($pemohon->kurung_waktu == 'minggu')
                        <td>@currency($total_angsuran)</td>
                    @else
                        <td>@currency($hutang)</td>
                    @endif
                </tr>
                <tr>
                    <td>Rekomendasi Pinjaman Maksimal</td>
                    @if ($pemohon->kurung_waktu == 'minggu')
                        <td>@currency($rekomendasi_minggu)</td>
                    @else
                        <td>@currency(floor($rekomendasi))</td>
                    @endif
                </tr>
                <tr>
                    <td>Tanggal Pengajuan</td>
                    <td>{{ $pemohon->tgl_pengajuan }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
