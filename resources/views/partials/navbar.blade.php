<nav id="sidebar">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <div class="p-4 pt-5">
        <img style="height:2.3cm; margin-left: 10px; margin-bottom:1em; " src="/images/logo_bkd.png" alt="image">
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="/dashboard">Dashboard</a>
                {{-- <ul class="collapse list-unstyled" id="homeSubmenu">
    <li>
        <a href="#">Home 1</a>
    </li>
    <li>
        <a href="#">Home 2</a>
    </li>
    <li>
        <a href="#">Home 3</a>
    </li>
    </ul> --}}
            </li>
            <li>
                <a href="/kuesioner">Kuesioner Bobot</a>
            </li>
            @can('admin')
                <li>
                    <a href="/pegawai">Akun Pengguna</a>
                </li>
                <li>
                    <a href="/periode">Periode</a>
                </li>
            @endcan
            <li>
                <a href="/pemohon">Daftar Debitur</a>
            </li>
            <li>
                <a href="/pinjaman">Daftar Pinjaman</a>
            </li>
            @can('admin')
                <li>
                    <a href="/kriteria">Daftar Kriteria</a>
                </li>
                <li>
                    <a href="/nilai">Daftar Penilaian</a>
                </li>
                <li>
                    <a href="/alternatif">Penentuan Penilaian Debitur</a>
                </li>
                {{-- <li>
                    <a href="/hasil">Hasil</a>
                </li> --}}
            @endcan
            <li>
                <a href="/account">Pengaturan Akun</a>
            </li>
            <li>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropbtn"
                        onclick="return confirm('Apakah anda ingin keluar?')">Logout</button>
                </form>
            </li>
        </ul>

        {{-- <div class="mb-5">
            <h3 class="h6">Subscribe for newsletter</h3>
            <form action="#" class="colorlib-subscribe-form">
                <div class="form-group d-flex">
                    <div class="icon"><span class="icon-paper-plane"></span></div>
                    <input type="text" class="form-control" placeholder="Enter Email Address">
                </div>
            </form>
        </div> --}}

        <div class="footer mb-0">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with by Yudhistira
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>

    </div>
</nav>
