<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>LAPORAN HASIL PERHITUNGAN</title>
</head>

<body>
    <div class="container mt-4">
        <center>
            <h4>LAPORAN HASIL PERHITUNGAN PENGAMBILAN KEPUTUSAN</h4>
        </center>
        <br />

        <table class='table table-bordere '>
            <thead>
                <tr>
                    <th>Nama Pemohon</th>
                    <th>Nilai Pinjaman</th>
                    <th>Pendapatan</th>
                    <th>Pendapatan Bersih</th>
                    <th>Pendapatan Toleransi</th>
                    <th>Deskripsi</th>
                    <th>Rekomendasi</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gaji as $pinjaman)
                    @php
                        //gaji bersih
                        $gajibersih = $pinjaman->gaji_kotor - ($pinjaman->usaha + $pinjaman->rumah_tangga + $pinjaman->lain_lain);
                        // normalisasi (75% dari gaji bersih)
                        $normalisasi = $gajibersih * (75 / 100);
                        // bunga awal + 100
                        $bunga = $pinjaman->bunga * $pinjaman->waktu + 100;
                        // pinjaman yang bisa diambil
                        $y = $normalisasi * $pinjaman->waktu;
                        // rekomendasi pengajuan besar pinjaman //
                        $rekomendasi = ($y * 100) / $bunga;
                        //rekomen mingguan
                        $bersihming = ($normalisasi / 4) * $pinjaman->waktu;
                    @endphp
                    <tr>
                        <td>{{ $pinjaman->pemohon->nama }}</td>
                        <td> @currency($pinjaman->pinjaman) </td>
                        <td> @currency($pinjaman->gaji_kotor) </td>
                        <td> @currency($gajibersih) </td>
                        <td> @currency($normalisasi) </td>
                        @if ($rekomendasi < $pinjaman->pinjaman)
                            <td><span style="color: red">Tidak Layak</span></td>
                        @else
                            <td><span>Layak</span> </td>
                        @endif
                        @if ($pinjaman->kurung_waktu == 'minggu')
                            <td>@currency(floor($bersihming))</td>
                        @else
                            <td>@currency(floor($rekomendasi))</td>
                        @endif
                        <td>{{ $pinjaman->pemohon->tgl_pengajuan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
