@extends('/layout.main')
@section('content')
    <div class="container" style="border: 1px solid rgb(190, 190, 190); border-radius: 10px; box-shadow: 2px 3px #888888">
        <h2 class="mb-4 mt-2">{{ $title }}</h2>
        <form class="needs-validation" method="POST" action="/nilai/{{ $nilai->id }}" novalidate>
            @csrf
            @method('PUT')
            <input type="hidden" name="id" class="form-control" value="{{ $nilai->id }}">
            <input type="hidden" name="kriteria_id" class="form-control" value="{{ $nilai->kriteria_id }}">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Kriteria</label>
                <div class="col-sm-10">
                    <input type="text" name="kriteria" class="form-control" style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ $nilai->kriteria->namaKriteria }}" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Deskripsi <span class="red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                        id="staticEmail" style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('deskripsi', $nilai->deskripsi) }}">
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nilai <span class="red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nilai') is-invalid @enderror" name="nilai"
                        style="border: 1px solid rgb(139, 139, 139)" value="{{ old('nilai', $nilai->nilai) }}">
                    @error('nilai')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update data</button>
            </div>
        </form>
    </div>
@endsection
