@extends('layout.main')
@section('content')
    <h2 class="mb-4">Daftar Registrasi Pegawai</h2>
    @if (session()->has('success'))
        <div class="alert alert-primary" role="alert">
            {{ session('success') }}
        </div>
    @elseif(session()->has('delete'))
        <div class="alert alert-danger" role="alert">
            {{ session('delete') }}
        </div>
    @endif
    {{-- <div class="d-flex justify-content-end">
        <a href="/alternatif/create" class="btn btn-outline-primary mb-2 ml-5">Tambah Alternatif</a>
    </div> --}}
    <table id="myTable" style="color: rgb(73, 73, 73);">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pegawai</th>
                <th scope="col">Email</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $n = 1;
                // dd($data);
            @endphp
            @foreach ($registrasi as $key => $value)
                <tr>
                    <th scope="row">{{ $n++ }}</th>
                    <td>{{ $value['name'] }}</td>
                    <td>{{ $value['email'] }}</td>
                    @if ($value['is_admin'] == true)
                        <td>Admin</td>
                    @else
                        <td>Pegawai</td>
                    @endif
                    @if ($value['is_admin'] == true)
                        <td>Validasi</td>
                    @else
                        <td>{{ $value['keterangan'] }}</td>
                    @endif
                    @if ($value['is_admin'] == true || $value['keterangan'] == 'Validasi')
                        <td></td>
                    @else
                        <td>
                            <a class="btn btn-outline-warning" href="pegawai/{{ $value['id'] }}" role="button">Setujui</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
