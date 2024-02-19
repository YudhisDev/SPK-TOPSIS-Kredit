@extends('layout.main')
@section('content')
    <div class="container">
        <h2 class="mb-4">Calon Debitur</h2>
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
            <a href="/pemohon/create" class="btn btn-outline-primary mb-2 ml-5">Tambah Debitur</a>
        </div>
        <table id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No KTP</th>
                    <th>Nama</th>
                    <th>Penanggung Jawab</th>
                    <th>Tanggal Masuk</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $n = 1; @endphp
                @foreach ($pengajuan as $p)
                    <tr>
                        <th scope="row">{{ $n++ }}</th>
                        <td>{{ $p->no_ktp }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->user->name }}</td>
                        <td>{{ $p->tgl_pengajuan }}</td>
                        <td>
                            <a href="/pemohon/{{ $p->id }}" class="btn btn-outline-success" role="button">Detail</a>
                            <form action="/pemohon/{{ $p->id }}" method="POST" class="d-inline">
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
    </div>
@endsection
