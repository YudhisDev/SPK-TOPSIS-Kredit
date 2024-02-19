@extends('/layout.main')
@section('content')
    <div class="container"
        style="margin-top: -2em; border: 1px solid rgb(190, 190, 190); border-radius: 10px; box-shadow: 2px 3px #888888">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Informasi Bobot Kriteria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <b>Keterangan Nilai</b>
                        <p>5 = Sangat Penting</p>
                        <p>4 = Penting</p>
                        <p>3 = Cukup Penting</p>
                        <p>2 = Kurang Penting</p>
                        <p>1 = Sangat Kurang Penting</p>
                        <br>
                        <b>Penjelasan Kriteria</b>
                        <p><b>Character = </b>Menilai Karakter Nasabah Pada Faktor Riwayat Pinjaman atau Kehidupan Pribadi
                        </p>
                        <p><b>Capacity = </b>Menilai Kemampuan Nasabah Dalam Mencicil Pinjaman Yang Diajukan</p>
                        <p><b>Capital = </b>Menilai Modal dan Laporan Keuangan Nasabah</p>
                        <p><b>Condition = </b>Menilai Kondisi Ekonomi Nasabah Saat Ini Maupun yang Akan Datang</p>
                        <p><b>Collateral = </b>Menilai Agunan Yang Diserahkan Nasabah</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex inline my-4">
            <h2 class="my-auto">{{ $title }}</h2>
            <i class="fa fa-info-circle my-auto ml-2" style="font-size:20px" data-bs-toggle="modal"
                data-bs-target="#exampleModal"></i>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-primary" role="alert">
                {{ session('success') }}
            </div>
        @elseif(session()->has('delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('delete') }}
            </div>
        @endif
        <form method="POST" action="/kuesioner/{{ $kuesioner->id }}" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value={{ $kuesioner->id }}>
            <div class="mb-4 row">
                <label class="col-sm-4 col-form-label">Bobot Character <span class="red">*</span></label>
                <div class="col-sm-8">
                    <select name="character" class="form-select @error('character') is-invalid @enderror" id="character"
                        aria-describedby="characterFeedback" required>
                        <option value="{{ $kuesioner->character }}">
                            @if ($kuesioner->character == 5)
                                Sangat Penting
                            @elseif($kuesioner->character == 4)
                                Penting
                            @elseif($kuesioner->character == 3)
                                Cukup
                            @elseif($kuesioner->character == 2)
                                Kurang
                            @elseif($kuesioner->character == 1)
                                Sangat Kurang
                            @endif
                        </option>
                        <option value="5">Sangat Penting</option>
                        <option value="4">Penting</option>
                        <option value="3">Cukup Penting</option>
                        <option value="2">Kurang Penting</option>
                        <option value="1">Sangat Kurang Penting</option>

                    </select>
                    @error('character')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-4 col-form-label">Bobot Capacity <span class="red">*</span></label>
                <div class="col-sm-8">
                    <select name="capacity" class="form-select @error('capital') is-invalid @enderror"
                        id="validationServer04" aria-describedby="validationServer04Feedback" required>
                        <option value="{{ $kuesioner->capacity }}">
                            @if ($kuesioner->capacity == 5)
                                Sangat Penting
                            @elseif($kuesioner->capacity == 4)
                                Penting
                            @elseif($kuesioner->capacity == 3)
                                Cukup
                            @elseif($kuesioner->capacity == 2)
                                Kurang
                            @elseif($kuesioner->capacity == 1)
                                Sangat Kurang
                            @endif
                        </option>
                        <option value="5">Sangat Penting</option>
                        <option value="4">Penting</option>
                        <option value="3">Cukup Penting</option>
                        <option value="2">Kurang Penting</option>
                        <option value="1">Sangat Kurang Penting</option>
                    </select>
                    @error('capital')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-4 col-form-label">Bobot Capital <span class="red">*</span></label>
                <div class="col-sm-8">
                    <select name="capital" class="form-select @error('capacity') is-invalid @enderror"
                        id="validationServer04" aria-describedby="validationServer04Feedback" required>
                        <option value="{{ $kuesioner->capital }}">
                            @if ($kuesioner->capital == 5)
                                Sangat Penting
                            @elseif($kuesioner->capital == 4)
                                Penting
                            @elseif($kuesioner->capital == 3)
                                Cukup
                            @elseif($kuesioner->capital == 2)
                                Kurang
                            @elseif($kuesioner->capital == 1)
                                Sangat Kurang
                            @endif
                        </option>
                        <option value="5">Sangat Penting</option>
                        <option value="4">Penting</option>
                        <option value="3">Cukup Penting</option>
                        <option value="2">Kurang Penting</option>
                        <option value="1">Sangat Kurang Penting</option>
                    </select>
                    @error('capacity')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-4 col-form-label">Bobot Collateral <span class="red">*</span></label>
                <div class="col-sm-8">
                    <select name="collateral" class="form-select @error('collateral') is-invalid @enderror"
                        id="validationServer04" aria-describedby="validationServer04Feedback" required>
                        <option value="{{ $kuesioner->collateral }}">
                            @if ($kuesioner->collateral == 5)
                                Sangat Penting
                            @elseif($kuesioner->collateral == 4)
                                Penting
                            @elseif($kuesioner->collateral == 3)
                                Cukup
                            @elseif($kuesioner->collateral == 2)
                                Kurang
                            @elseif($kuesioner->collateral == 1)
                                Sangat Kurang
                            @endif
                        </option>
                        <option value="5">Sangat Penting</option>
                        <option value="4">Penting</option>
                        <option value="3">Cukup Penting</option>
                        <option value="2">Kurang Penting</option>
                        <option value="1">Sangat Kurang Penting</option>
                    </select>
                    @error('collateral')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-4 col-form-label">Bobot Condition of Economy <span class="red">*</span></label>
                <div class="col-sm-8">
                    <select name="condition" class="form-select @error('condition') is-invalid @enderror"
                        id="validationServer04" aria-describedby="validationServer04Feedback" required>
                        <option value="{{ $kuesioner->condition }}">
                            @if ($kuesioner->condition == 5)
                                Sangat Penting
                            @elseif($kuesioner->condition == 4)
                                Penting
                            @elseif($kuesioner->condition == 3)
                                Cukup
                            @elseif($kuesioner->condition == 2)
                                Kurang
                            @elseif($kuesioner->condition == 1)
                                Sangat Kurang
                            @endif
                        </option>
                        <option value="5">Sangat Penting</option>
                        <option value="4">Penting</option>
                        <option value="3">Cukup Penting</option>
                        <option value="2">Kurang Penting</option>
                        <option value="1">Sangat Kurang Penting</option>
                    </select>
                    @error('condition')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
