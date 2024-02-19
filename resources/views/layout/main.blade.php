<!doctype html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        .table th,
        .table td {
            border: 1px solid rgb(109, 111, 114);
        }

        .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 10px 0px;
            background-color: inherit;
            font-family: inherit;
            /* Important for vertical align on mobile phones */
            margin: 0;
            /* Important for vertical align on mobile phones */
        }

        .alert {
            width: 40%;
        }

        .red {
            color: red;
        }
    </style>
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        @include('partials.navbar')

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <img src="<?= asset('images/logo_bkd.png') ?>" alt="image"
                style="height:2cm; margin:2em 4em; position: absolute; top: 0; right:0;">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    {{-- <script src="/js/jquery.min.js"></script> --}}
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>

    <script>
        // Tambahkan event listener saat tombol "Tampilkan Data" ditekan
        $(document).ready(function() {
            $('#pemohon_id').on('change', function() {
                var pemohon_id = $('#pemohon_id').val();
                var id_periode = $('#id_periode').val();

                // Kirim permintaan AJAX ke server untuk mendapatkan data
                $.ajax({
                    method: 'GET',
                    url: '/alternatif/loaddata', // Sesuaikan dengan route yang sesuai
                    data: {
                        pemohon_id: pemohon_id,
                        id_periode: id_periode
                    },
                    success: function(response) {

                        // Update tampilan dengan data yang diterima
                        $('#data-container').html(response);

                        // Setelah data dimuat, inisialisasi DataTable
                        new DataTable('#myTable', {
                            "autoWidth": false,
                        });
                    },
                    error: function() {

                        // Handle error
                        alert('Terjadi kesalahan saat mengambil data.');
                    }
                });
            });
        });
    </script>

    <script>
        let table = new DataTable('#myTable');
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>
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
    <script>
        //Pinjaman
        var pinjaman = document.getElementById('pinjaman');
        pinjaman.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatpinjaman() untuk mengubah angka yang di ketik menjadi format angka
            pinjaman.value = formatpinjaman(this.value, "");
        });

        /* Fungsi formatpinjaman */
        function formatpinjaman(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                pinjaman = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                pinjaman += separator + ribuan.join(".");
            }

            pinjaman = split[1] != undefined ? pinjaman + "," + split[1] : pinjaman;
            return prefix == undefined ? pinjaman : pinjaman ? "" + pinjaman : "";
        }
        //gaji
        var gaji = document.getElementById('gaji');
        gaji.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatgaji() untuk mengubah angka yang di ketik menjadi format angka
            gaji.value = formatgaji(this.value, "");
        });

        /* Fungsi formatgaji */
        function formatgaji(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                gaji = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                gaji += separator + ribuan.join(".");
            }

            gaji = split[1] != undefined ? gaji + "," + split[1] : gaji;
            return prefix == undefined ? gaji : gaji ? "" + gaji : "";
        }
        var usaha = document.getElementById('usaha');
        usaha.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatusaha() untuk mengubah angka yang di ketik menjadi format angka
            usaha.value = formatusaha(this.value, "");
        });

        /* Fungsi formatusaha */
        function formatusaha(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                usaha = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                usaha += separator + ribuan.join(".");
            }

            usaha = split[1] != undefined ? usaha + "," + split[1] : usaha;
            return prefix == undefined ? usaha : usaha ? "" + usaha : "";
        }
        //rumah
        var rumah = document.getElementById('rumah');
        rumah.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatrumah() untuk mengubah angka yang di ketik menjadi format angka
            rumah.value = formatrumah(this.value, "");
        });

        /* Fungsi formatrumah */
        function formatrumah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rumah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rumah += separator + ribuan.join(".");
            }

            rumah = split[1] != undefined ? rumah + "," + split[1] : rumah;
            return prefix == undefined ? rumah : rumah ? "" + rumah : "";
        }
        var lain = document.getElementById('lain');
        lain.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatlain() untuk mengubah angka yang di ketik menjadi format angka
            lain.value = formatlain(this.value, "");
        });

        /* Fungsi formatlain */
        function formatlain(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                lain = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                lain += separator + ribuan.join(".");
            }

            lain = split[1] != undefined ? lain + "," + split[1] : lain;
            return prefix == undefined ? lain : lain ? "" + lain : "";
        }
        var simpanan = document.getElementById('simpanan');
        simpanan.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatsimpanan() untuk mengubah angka yang di ketik menjadi format angka
            simpanan.value = formatsimpanan(this.value, "");
        });

        /* Fungsi formatsimpanan */
        function formatsimpanan(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                simpanan = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                simpanan += separator + ribuan.join(".");
            }

            simpanan = split[1] != undefined ? simpanan + "," + split[1] : simpanan;
            return prefix == undefined ? simpanan : simpanan ? "" + simpanan : "";
        }
    </script>
</body>

</html>
