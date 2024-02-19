<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>{{ $title }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">


    <link href="/css/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .gradient {
            background: linear-gradient(#a0e0ec, #F3F3F3);
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
</head>

<body class="gradient text-center">

    @if (session()->has('LoginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('LoginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
    </div>
    <main class="form-signin w-100 m-auto">

        <form action="/register" method="POST">
            <img class="mb-2" src="/images/logo_bkd.png" alt="" width="200">
            <h3 class="mb-3 fw-normal">Silahkan Buat Akun</h3>
            @csrf
            <div class="form-floating mb-2">
                <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror"
                    id="name" placeholder="name" autofocus required value="{{ old('name') }}">
                <label for="name">Username</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-2">
                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror"
                    id="email" placeholder="email" required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror"
                    id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex justify-content-end form-check mb-2 text-start">
                <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Show Password
                </label>
            </div>
            <div class="form mb-2">
                <select name="is_admin" class="form-select py-3 @error('is_admin') is-invalid @enderror"
                    id="validationServer04" aria-describedb="validationServer04Feedback" required>
                    <option value="">--Pilih--</option>
                    @if ($admin == null)
                        <option value="1">Admin</option>
                        <option value="0">Pegawai</option>
                    @else
                        <option value="0">Pegawai</option>
                    @endif
                </select>
                @error('is_admin')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <input type="hidden" name="keterangan" value="Belum Validasi">
            <button class="w-100 btn btn-lg btn-primary mb-2" type="submit">Create accout</button>
        </form>
        <p class="mb-3 text-muted">kembali ke halaman <a href="/">login</a></p>
    </main>



</body>
<script>
    const passwordInput = document.getElementById("password")
    const showPassword = document.getElementById("flexCheckDefault")
    showPassword.addEventListener('change', function() {
        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
</script>

</html>
