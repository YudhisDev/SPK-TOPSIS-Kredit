@extends('layout.main')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-primary" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <h2 class="mb-4 text-center">Selamat Datang {{ auth()->user()->name }}</h2>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Debitur</h5>
                    <h6 class="card-text">Total {{ $pemohon }} Debitur</h6>
                    <a href="/pemohon" class="btn btn-primary">Kelola Debitur</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Pinjaman</h5>
                    <h6 class="card-text">Total {{ $pinjaman }} Pinjaman</h6>
                    <a href="/pinjaman" class="btn btn-primary">Kelola Pinjaman</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Penilaian Debitur</h5>
                    <h6 class="card-text">Total {{ $alternatif / 5 }} Penilaian</h6>
                    <a href="/alternatif" class="btn btn-primary">Kelola Penilaian Debitur</a>
                </div>
            </div>
        </div>
    </div>
@endsection
