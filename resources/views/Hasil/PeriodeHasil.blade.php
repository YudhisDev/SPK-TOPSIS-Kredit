@extends('layout.main')
@section('content')
    <div class="container">
        <h2 class="mb-4">Periode Hasil</h2>
        @if (session()->has('success'))
            <div class="alert alert-primary" role="alert">
                {{ session('success') }}
            </div>
        @elseif(session()->has('delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('delete') }}
            </div>
        @endif
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
                            <a href="hasil/periode/{{ $p->id }}" class="btn btn-outline-success" role="button">Lihat
                                Hasil</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
