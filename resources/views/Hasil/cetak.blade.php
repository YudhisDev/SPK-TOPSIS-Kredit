<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>LAPORAN HASIL PERHITUNGAN</title>
</head>

<body onload="window.print()">
    <div class="container mt-4">
        <center>
            <h4>LAPORAN HASIL PERHITUNGAN PENGAMBILAN KEPUTUSAN<br> PT. LKM BKD PURWOKERTO</h4>
            <p style="margin-bottom : 1em;">Jl. Raya Patikraja-Banyumas, Sokawera Kidul,<br> Kecamatan. Patikraja,
                Kabupaten
                Banyumas,
                Jawa Tengah
            </p>
            <h5>Periode {{ $judul->periode }}</h5>
        </center>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nomor KTP</th>
                    <th scope="col">Nilai</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Tanggal Pengajuan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($data as $result)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $result->pemohon->nama }}</td>
                        <td>{{ $result->pemohon->no_ktp }}</td>
                        <td>{{ $result->nilai * 100 }}% </td>
                        @if ($result->nilai <= 0.3)
                            <td>Tidak Layak</span></td>
                        @elseif($result->nilai > 0.3 && $result->nilai < 0.7)
                            <td>Dipertimbangkan</span></td>
                        @elseif($result->nilai >= 0.7)
                            <td>Layak</span></td>
                        @endif
                        <td>{{ $result->pemohon->tgl_pengajuan }}</td>
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
    {{-- <script>
        document.onload = function(e) {
            document.print();
        }
    </script> --}}
</body>

</html>
