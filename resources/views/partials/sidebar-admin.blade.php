<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between" style="margin-bottom: -5px;">
                <div style="width: 110px; height: 65px;">
                    <a href="{{ route('admin.dashboard') }}" style="display: flex; align-items: center; padding: 8px; height: 100%;">
                        <img src="{{ asset('assets/images/logo/simba.jpg') }}" alt="Logo" class="img-fluid" style="width: 140px; height: 140px; object-fit: cover;">
                        <span style="font-weight: bold; font-size: 2rem; margin-left: 2px;">MySimba</span>
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle">ii</i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item" id="dashboard">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i><span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item" id="manajemenuser">
                    <a href="{{ route('admin.users.index') }}" class="sidebar-link">
                        <i class="bi bi-people-fill"></i><span>Manajemen User</span>
                    </a>
                </li>
                <li class="sidebar-item" id="databeasiswa">
                    <a href="{{ route('admin.beasiswas.index') }}" class="sidebar-link">
                        <i class="bi bi-award-fill"></i><span>Data Beasiswa</span>
                    </a>
                </li>
                <li class="sidebar-item dropdown">
                    <a href="#" class="sidebar-link dropdown-toggle" id="kriteriaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-list-ul"></i><span>Kriteria</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="kriteriaDropdown">
                        @foreach ($beasiswas as $beasiswa)
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.kriteria.create', $beasiswa->id) }}">
                                Kriteria: {{ $beasiswa->nama }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.pendaftaran.index') }}" class="sidebar-link" id="dataseleksi">
                        <i class="bi bi-sliders"></i><span>Data Seleksi</span>
                    </a>
                </li>
                <li class="sidebar-item" id="hasilproses">
                    <a href="{{ route('admin.hasilsaw.index') }}" class="sidebar-link">
                        <i class="bi bi-bar-chart-line"></i><span>Hasil Proses SAW</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('logout') }}" class="sidebar-link">
                        <i class="bi bi-box-arrow-right"></i><span>Logout</span>
                    </a>
                </li>
            </ul>

            <button class="sidebar-toggler btn x"><i data-feather="x">ii</i></button>
        </div>
    </div>
</div>
