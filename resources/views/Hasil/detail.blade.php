@extends('layout.main')
@section('content')
    <h2 class="mb-3">Detail Penilaian Nasabah</h2>
    <div class="mt-4">
        <table class="table mt-4">
            <tbody>
                <tr>
                    <td class="width">Nama</td>
                    @foreach ($penilaian->unique('pemohon_id') as $item)
                        <td colspan="2">{{ $item->pemohon->nama }}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>Nomor KTP</td>
                    @foreach ($penilaian->unique('pemohon_id') as $item)
                        <td colspan="2">{{ $item->pemohon->no_ktp }}</td>
                    @endforeach
                </tr>
                <tr>

                    <td>Karakter debitur dan tergolong baru/lama</td>
                    @foreach ($penilaian->where('kriteria_id', 1) as $item)
                        <td>{{ $item->nilai->deskripsi }}</td>
                        <td style="width: 20%"> Poin: {{ $item->nilai->nilai }} </td>
                    @endforeach

                </tr>
                <tr>
                    <td>Kemampuan debitur dalam melunasi hutang</td>
                    @foreach ($penilaian->where('kriteria_id', 2) as $item)
                        <td>{{ $item->nilai->deskripsi }}</td>
                        <td> Poin: {{ $item->nilai->nilai }} </td>
                    @endforeach
                </tr>
                <tr>
                    <td>Status Laporan Keuangan dan Modal Debitur</td>
                    @foreach ($penilaian->where('kriteria_id', 3) as $item)
                        <td>{{ $item->nilai->deskripsi }}</td>
                        <td> Poin: {{ $item->nilai->nilai }} </td>
                    @endforeach
                </tr>
                <tr>
                    <td>Kondisi Pekerjaan dan Usaha Debitur</td>
                    @foreach ($penilaian->where('kriteria_id', 4) as $item)
                        <td>{{ $item->nilai->deskripsi }}</td>
                        <td> Poin: {{ $item->nilai->nilai }} </td>
                    @endforeach
                </tr>
                <tr>
                    <td>Kondisi Jaminan Debitur</td>
                    @foreach ($penilaian->where('kriteria_id', 5) as $item)
                        <td>{{ $item->nilai->deskripsi }}</td>
                        <td> Poin: {{ $item->nilai->nilai }} </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
@endsection
