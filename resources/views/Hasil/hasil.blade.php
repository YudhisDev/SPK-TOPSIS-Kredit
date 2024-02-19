@extends('layout.main')
@section('content')
    <h2 class="mb-3">Hasil Perhitungan Periode {{ $periode->periode }}</h2>
    <a class="btn btn-outline-success mb-4" href="/cetak/{{ $periode->id }}" role="button" target="_blank">Cetak Laporan</a>
    <h4 class="mb-2">Ranking setiap alternatif</h4>
    <table id="myTable" style="color: rgb(73, 73, 73);">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scope="col">Nilai</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Aksi</th>
            </tr>

        </thead>
        <tbody>
            @php
                $r = 1;
            @endphp
            @foreach ($hasil as $result)
                <tr>
                    <td scope="col">{{ $r }}</td>
                    <td scope="col">{{ $result->id_pemohon }}</td>
                    <td scope="col">{{ $result->pemohon->no_ktp }}</td>
                    <td scope="col">{{ $result->pemohon->nama }}</td>
                    <td scope="col">{{ $result->nilai * 100 }}%</td>
                    @if ($result->nilai <= 0.3)
                        <td><span class="badge bg-danger">Tidak Layak</span></td>
                    @elseif($result->nilai > 0.3 && $result->nilai < 0.7)
                        <td><span class="badge bg-warning">Dipertimbangkan</span></td>
                    @elseif($result->nilai >= 0.7)
                        <td><span class="badge bg-success">Layak</span></td>
                    @endif
                    <td scope="col">
                        <a class="btn btn-outline-success mb-4"
                            href="/hasil/detail/{{ $periode->id }}/{{ $result->id_pemohon }}" role="button">Detail
                            Pemohon</a>
                    </td>
                </tr>
                @php $r++ @endphp
            @endforeach
        </tbody>
    </table>
    <h4 class="mb-2">Data Alternatif</h4>
    <table class="table table-striped table-hover">
        <tr>
            <th scope="col">No</th>
            <th scope="col">ID Debitur</th>
            <th scope="col">Bobot Character</th>
            <th scope="col">Bobot Capacity</th>
            <th scope="col">Bobot Capital</th>
            <th scope="col">Bobot Condition</th>
            <th scope="col">Bobot Collateral</th>
        </tr>
        @php
            $n = 1;
        @endphp
        @foreach ($nilai as $key => $value)
            <tr>
                <th scope="row">{{ $n++ }}</th>
                <td>{{ $key }}</td>
                <td>{{ $nilai[$key][0] }}</td>
                <td>{{ $nilai[$key][1] }}</td>
                <td>{{ $nilai[$key][2] }}</td>
                <td>{{ $nilai[$key][3] }}</td>
                <td>{{ $nilai[$key][4] }}</td>
            </tr>
        @endforeach
    </table>

    <h4 class="mb-2">Data Pembagi</h4>
    <table class="table table-striped table-hover">
        <tr>
            <th scope="col">Kriteria</th>
            <th scope="col">Bobot Character</th>
            <th scope="col">Bobot Capacity</th>
            <th scope="col">Bobot Capital</th>
            <th scope="col">Bobot Condition</th>
            <th scope="col">Bobot Collateral</th>
        </tr>
        <tr>
            <th scope="col">Pembagi</th>
            @foreach ($pembagi as $key => $value)
                <td>{{ $pembagi[$key] }}</td>
            @endforeach
        </tr>
    </table>

    <h4 class="mb-2">Hasil Perhitungan Matriks Normalisasi</h4>
    <table class="table table-striped table-hover">
        <tr>
            <th scope="col">No</th>
            <th scope="col">ID Debitur</th>
            <th scope="col">Bobot Character</th>
            <th scope="col">Bobot Capacity</th>
            <th scope="col">Bobot Capital</th>
            <th scope="col">Bobot Condition</th>
            <th scope="col">Bobot Collateral</th>
        </tr>
        <?php
        $i = 1;
        ?>
        @foreach ($normalisasiMatriks as $key => $value)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $key }}</td>
                <td>{{ $normalisasiMatriks[$key][0] }}</td>
                <td>{{ $normalisasiMatriks[$key][1] }}</td>
                <td>{{ $normalisasiMatriks[$key][2] }}</td>
                <td>{{ $normalisasiMatriks[$key][3] }}</td>
                <td>{{ $normalisasiMatriks[$key][4] }}</td>
            </tr>
        @endforeach
    </table>

    <h4 class="mb-2">Hasil Perhitungan Matriks Normalisasi Terbobot</h4>
    <table class="table table-striped table-hover">
        <tr>
            <th scope="col">No</th>
            <th scope="col">ID Debitur</th>
            <th scope="col">Bobot Character</th>
            <th scope="col">Bobot Capacity</th>
            <th scope="col">Bobot Capital</th>
            <th scope="col">Bobot Condition</th>
            <th scope="col">Bobot Collateral</th>
        </tr>
        <?php
        $i = 1;
        ?>
        @foreach ($normalisasiTerbobot as $key => $value)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $key }}</td>
                <td>{{ $normalisasiTerbobot[$key][0] }}</td>
                <td>{{ $normalisasiTerbobot[$key][1] }}</td>
                <td>{{ $normalisasiTerbobot[$key][2] }}</td>
                <td>{{ $normalisasiTerbobot[$key][3] }}</td>
                <td>{{ $normalisasiTerbobot[$key][4] }}</td>
            </tr>
        @endforeach

    </table>

    <h4 class="mb-4">Solusi Ideal Positif dan Solusi Ideal Negatif</h4>
    <table class="table table-striped table-hover">
        <tr>
            <th scope="col">Keterangan</th>
            @foreach ($kriteria as $item)
                <th>{{ $item->namaKriteria }}</th>
            @endforeach
        </tr>
        <tr>
            <th>Maximal</th>
            @foreach ($positif as $key => $value)
                <td scope="col">{{ $positif[$key] }}</td>
            @endforeach
        </tr>
        <tr>
            <th> Minimal </th>
            @foreach ($negatif as $key => $value)
                <td scope="col">{{ $negatif[$key] }}</td>
            @endforeach
        </tr>

    </table>

    <h4 class="mb-2">Jarak Alternatif Dengan Solusi Ideal Positif dan Negatif</h4>
    <table class="table table-striped table-hover">
        <tr>
            <th scope="col">ID Debitur</th>
            <th scope="col">Solusi Positif</th>
            <th scope="col">Solusi Negatif</th>
        </tr>
        @foreach ($arrPositif as $key => $value)
            <tr>
                <td scope="col">{{ $key }}</td>
                <td scope="col">{{ $arrPositif[$key] }}</td>
                <td scope="col">{{ $arrNegatif[$key] }}</td>
            </tr>
        @endforeach

    </table>
    <h4 class="mb-2">Nilai Preferensi Alternatif</h4>
    <table class="table table-striped table-hover">
        <tr>
            <th scope="col">ID Debitur</th>
            <th scope="col">Nama Debitur</th>
            <th scope="col">Nilai Preferensi</th>
        </tr>
        @foreach ($hasil as $result)
            <tr>
                <td scope="col">{{ $result->id_pemohon }}</td>
                <td scope="col">{{ $result->pemohon->nama }}</td>
                <td scope="col">{{ $result->nilai }}</td>
            </tr>
        @endforeach

    </table>
@endsection
