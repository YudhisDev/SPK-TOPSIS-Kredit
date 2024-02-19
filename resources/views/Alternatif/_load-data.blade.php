<hr>
<h6 class="text-center">Informasi Untuk Penilaian Capacity</h6>
<table id="myTable" style="color: rgb(73, 73, 73);">
    <thead>
        <tr>
            <th class="align-middle">No</th>
            <th class="align-middle">Nama Pemohon</th>
            <th class="align-middle">Periode</th>
            <th class="align-middle">Keterangan</th>
            <th class="align-middle">Tanggal Pengajuan</th>
        </tr>
    </thead>
    <tbody>
        @php
            $nomor = 1;
        @endphp
        @foreach ($data as $item)
            @php
                //gaji bersih
                $gajibersih = $item->gaji_kotor - ($item->usaha + $item->rumah_tangga + $item->lain_lain);
                // normalisasi (75% dari gaji bersih)
                $normalisasi = $gajibersih * (75 / 100);
                // rekomendasi pengajuan besar Pinjaman //
                $a = (100 + $item->bunga * $item->waktu) / 100;
                $rekomendasi = ($normalisasi * $item->waktu) / $a;
                //rekomen mingguan
                $payment_minggu = $normalisasi / 4;

                $total_angsuran = $payment_minggu * $item->waktu;
            @endphp
            <tr>
                <td>{{ $nomor++ }}</td>
                <td>{{ $item->pemohon->nama }}</td>
                <td>{{ $item->periode->periode }}</td>
                @if ($item->kurung_waktu == 'bulan')
                    @if ($rekomendasi < $item->pinjaman)
                        <td><span class="badge bg-danger">Tidak Layak</span></td>
                    @else
                        <td> <span class="badge bg-primary">Layak</span> </td>
                    @endif
                @else
                    @if ($total_angsuran < $item->pinjaman)
                        <td><span class="badge bg-danger">Tidak Layak</span></td>
                    @else
                        <td><span class="badge bg-primary">Layak</span> </td>
                    @endif
                @endif
                <td>{{ $item->tgl_pengajuan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{-- @if (!$data->isEmpty())
    <div class="my-3"> --}}
{{-- <a href="{{ route('analisis.hitung') }}" id="analisis-link">
            <button type="button" class="btn btn-success btn-block">Analisis</button>
        </a> --}}
{{-- <a href="{{ route('analisis.hitung', ['bulan' => $bulan, 'tahun' => $tahun]) }}" id="analisis-link">
            <button type="button" class="btn btn-success btn-block">Analisis</button>
        </a>
    </div> --}}

{{-- <script>
        $(document).ready(function() {
            // Mengambil nilai bulan dan tahun dari input
            var bulan = $('#bulan').val();
            var tahun = $('#tahun').val();
    
            // Membuat URL dengan parameter bulan dan tahun
            var url = "{{ route('analisis.hitung') }}?bulan=" + bulan + "&tahun=" + tahun;
    
            // Mengubah atribut href dari tautan Analisis
            $('#analisis-link').attr('href', url);
        });
    </script> --}}
{{-- @endif --}}
