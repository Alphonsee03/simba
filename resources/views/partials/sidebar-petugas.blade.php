<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between" style="margin-bottom: -5px;">
                <div style="width: 110px; height: 65px;">
                    <a href="{{ route('petugas.dashboard.index') }}" style="display: flex; align-items: center; padding: 8px; height: 100%;">
                        <img src="{{ asset('assets/images/logo/simba.jpg') }}" alt="Logo" class="img-fluid" style="width: 140px; height: 140px; object-fit: cover;">
                        <span style="font-weight: bold; font-size: 2rem; margin-left: 2px;">MySimba</span>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle">ii</i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item active">
                    <a href="" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i><span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item active" >
                    <a href="" class="sidebar-link">
                        <i class="bi bi-person-lines-fill"></i><span>Data Mahasiswa</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('petugas.pendaftaran.index') }}" class="sidebar-link">
                        <i class="bi bi-check-circle-fill"></i><span>Validasi Berkas</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link">
                        <i class="bi bi-award-fill"></i><span>Data Beasiswa</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link">
                        <i class="bi bi-list-check"></i><span>Kriteria Penilaian</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('logout') }}" class="sidebar-link">
                        <i class="bi bi-box-arrow-right"></i><span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>