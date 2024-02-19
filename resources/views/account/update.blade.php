@extends('layout.main')
@section('content')
    <div class="container"
        style="border: 1px solid rgb(190, 190, 190); border-radius: 10px; box-shadow: 2px 3px #888888; margin-top:5em;">
        <h2 class="mb-4 mt-2">{{ $title }}</h2>
        @if (session()->has('success'))
            <div class="alert alert-primary" role="alert">
                {{ session('success') }}
            </div>
        @elseif(session()->has('delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('delete') }}
            </div>
        @endif
        <form class="needs-validation" method="POST" action="/account/{{ $user->id }}" novalidate>
            @csrf
            @method('PUT')
            <div class="mb-4 row">
                <label class="col-sm-2 col-form-label">Id User</label>
                <div class="col-sm-3">
                    <input type="text" name="id" class="form-control" id="staticEmail"
                        style="border: 1px solid rgb(139, 139, 139)" value="{{ $user->id }}" readonly>
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-2 col-form-label">Username<span class="red">*</span></label>
                <div class="col-sm-3">
                    <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror"
                        id="staticEmail" style="border: 1px solid rgb(139, 139, 139)" value="{{ old('name', $user->name) }}"
                        required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-2 col-form-label">Email<span class="red">*</span></label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror"
                        id="staticEmail" style="border: 1px solid rgb(139, 139, 139)"
                        value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-2 col-form-label">Password<span class="red">*</span></label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror"
                        id="password" style="border: 1px solid rgb(139, 139, 139)" placeholder="Minimal 8 karakter">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-check mt-1">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Show Password
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
