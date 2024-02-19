@extends('/layout.main')
@section('content')
    <div class="container"
        style="margin-top: -2em; border: 1px solid rgb(190, 190, 190); border-radius: 10px; box-shadow: 2px 3px #888888">
        <a class="mt-2 btn btn-outline-warning" href="/periode">KEMBALI </a>
        <h2 class="mb-5">{{ $title }}</h2>
        <form class="needs-validation" method="POST" action="/periode" novalidate enctype="multipart/form-data">
            @csrf
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Periode <span class="red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" name="periode" class="form-control  @error('periode') is-invalid @enderror"
                        id="staticEmail" style="border: 1px solid rgb(139, 139, 139)" value="{{ old('periode') }}" autofocus
                        required>
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
