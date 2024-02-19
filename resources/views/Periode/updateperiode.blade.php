@extends('layout.main')
@section('content')
    <div class="container" style="border: 1px solid rgb(190, 190, 190); border-radius: 10px; box-shadow: 2px 3px #888888">
        <h2 class="mb-4 mt-2">{{ $title }}</h2>
        <form class="needs-validation" method="POST" action="/periode/{{ $periode->id }}" novalidate>
            @csrf
            @method('PUT')
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Id Kriteria</label>
                <div class="col-sm-10">
                    <input type="text" name="id" class="form-control  @error('id') is-invalid @enderror"
                        id="staticEmail" style="border: 1px solid rgb(139, 139, 139)" value="{{ old('id', $periode->id) }}"
                        readonly>
                    @error('id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Periode</label>
                <div class="col-sm-10">
                    <input type="text" name="periode" class="form-control  @error('periode') is-invalid @enderror"
                        id="staticEmail" style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('periode', $periode->periode) }}">
                    @error('periode')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
