@extends('layout.main')
@section('content')
    <div class="container">
        <h2 class="mb-4">Daftar Periode</h2>
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
            <a href="/periode/create" class="btn btn-outline-primary mb-2 ml-5">Tambah Periode</a>
        </div>
        <table id="myTable">
            <thead>
                <tr>
                    <th>Id Periode</th>
                    <th>Periode</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $n = 1; @endphp
                @foreach ($periode as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->periode }}</td>
                        <td>
                            <a href="periode/{{ $p->id }}/edit" class="btn btn-outline-success"
                                role="button">Update</a>
                            {{-- <form action="/periode/{{ $p->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-outline-danger"
                                    onclick="return confirm('Anda yakin menghapus data ini?')">Hapus</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
