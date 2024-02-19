@extends('layout.main')
@section('content')
    <div class="container" style="border: 1px solid rgb(190, 190, 190); border-radius: 10px; box-shadow: 2px 3px #888888">
        <h2 class="mb-4 mt-2">{{ $title }}</h2>
        <form class="needs-validation" method="POST" action="/kriteria/{{ $post->id }}" novalidate>
            @csrf
            @method('PUT')
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Id Kriteria</label>
                <div class="col-sm-10">
                    <input type="text" name="id" class="form-control  @error('id') is-invalid @enderror"
                        id="staticEmail" style="border: 1px solid rgb(139, 139, 139)" value="{{ old('id', $post->id) }}"
                        readonly>
                    @error('id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nama Kriteria</label>
                <div class="col-sm-10">
                    <input type="text" name="namaKriteria"
                        class="form-control @error('namaKriteria') is-invalid @enderror" id="staticEmail"
                        style="border: 1px solid rgb(139, 139, 139)" value="{{ old('namaKriteria', $post->namaKriteria) }}"
                        readonly>
                    @error('namaKriteria')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Bobot Nilai <span class="red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nilaiBobot') is-invalid @enderror" name="nilaiBobot"
                        style="border: 1px solid rgb(139, 139, 139)" value="{{ old('nilaiBobot', $post->nilaiBobot) }}">
                    @error('nilaiBobot')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Jenis Kriteria <span class="red">*</span></label>
                <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis" value="benefit"
                            {{ $post->jenis == 'benefit' ? 'checked' : '' }}>
                        <label class="form-check-label">
                            Benefit
                        </label>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis" value="cost"
                            {{ $post->jenis == 'cost' ? 'checked' : '' }}>
                        <label class="form-check-label">
                            Cost
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
