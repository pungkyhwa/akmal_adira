<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{asset('assets/images/faces/face1.jpg')}}" alt="profile" />
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">David Grey. H</span>
                    <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('asuransiRate.index')}}">
                <span class="menu-title">Insurance Rate</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('tenor.index')}}">
                <span class="menu-title">Tenor</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('biayaMitra.index')}}">
                <span class="menu-title">Fee Aksi</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('rate.index')}}">
                <span class="menu-title">Rate</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('biayaAdmin.index')}}">
                <span class="menu-title">Biaya Admin</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Kendaraan</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('jnsKendaraan.index')}}">Jenis Kendaraan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('merekKendaraan.index')}}">Merek Kendaraan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('tahunKendaraan.index')}}">Tahun Kendaraan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('tipeKendaraan.index')}}">Tipe Kendaraan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('hargaKendaraan.index')}}">Harga Kendaraan</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('simulasi.index')}}">
                <span class="menu-title">Simulasi</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
