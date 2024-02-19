@extends('/layout.main')
@section('content')
    <div class="container"
        style="margin-top: 5em; border: 1px solid rgb(190, 190, 190); border-radius: 10px; box-shadow: 2px 3px #888888">
        <h2 class="mb-4 mt-2">{{ $title }}</h2>
        {{-- {{ dd($alternatif) }} --}}
        <div class="row mx-1">
            <form method="POST" action="/nilai">
                @csrf
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Kriteria</label>
                    <div class="col-sm-3">
                        <input type="text" name="kriteria_id" class="form-control" id="staticEmail"
                            style="border: 1px solid rgb(139, 139, 139)" value="{{ $id_kriteria }}" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Deskripsi <span class="red">*</span></label>
                    <div class="col-sm-6">
                        <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                            id="staticEmail" style="border: 1px solid rgb(139, 139, 139)" value="{{ old('deskripsi') }}">
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Nilai <span class="red">*</span></label>
                    <div class="col-sm-6">
                        <input type="text" name="nilai" class="form-control @error('nilai') is-invalid @enderror"
                            id="staticEmail" style="border: 1px solid rgb(139, 139, 139)" value="{{ old('nilai') }}">
                        @error('nilai')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
