<nav class="navbar navbar-light navbar-vertical navbar-expand-xl navbar-vibrant">
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">

            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
                data-bs-placement="left" title="" data-bs-original-title="Toggle Navigation"
                aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                        class="toggle-line"></span></span></button>
        </div><a class="navbar-brand" href="index.html">
            <div class="d-flex align-items-center py-3"><span class="font-sans-serif" style="font-size: 20px;">OMEGA
                    MOTOR</span>
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}"
                        role="button" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-chart-pie"></span>
                            </span>
                            <span class="nav-link-text ps-1">Dashboard</span>
                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">App
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider">
                        </div>
                    </div>

                    {{-- MASTER --}}
                <li
                    class="nav-item {{ request()->is('admin/karyawan*') || request()->is('admin/user*') || request()->is('admin/akses*') || request()->is('admin/departemen*') ? 'menu-open' : '' }}">
                    <a
                        class="nav-link {{ request()->is('admin/karyawan*') || request()->is('admin/user*') || request()->is('admin/akses*') || request()->is('admin/departemen*') ? 'active' : '' }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-grip-horizontal"></span>
                            </span>
                            <span class="nav-link-text ps-1">MASTER</span>
                        </div>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/karyawan') }}" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">
                                        <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                        Data Karyawan</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/user') }}" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                        <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                        Data User</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/hak_akses') }}"
                                aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                        <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                        Hak Akses</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li> --}}
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/departemen') }}"
                                aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                        <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                        Data Departemen</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/merek') }}" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                        <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                        Data Merek</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/modelken') }}"
                                aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                        <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                        Data Model</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/tipe') }}" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                        <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                        Data Tipe</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/kendaraan') }}"
                                aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                        <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                        Data Kendaraan</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/pelanggan') }}"
                                aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                        <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                        Data Pelanggan</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item {{ request()->is('admin/karyawan*') || request()->is('admin/user*') || request()->is('admin/akses*') || request()->is('admin/departemen*') ? 'menu-open' : '' }}">
                    <a
                        class="nav-link {{ request()->is('admin/karyawan*') || request()->is('admin/user*') || request()->is('admin/akses*') || request()->is('admin/departemen*') ? 'active' : '' }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-exchange-alt"></span>
                            </span>
                            <span class="nav-link-text ps-1">TRANSAKSI</span>
                        </div>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/pembelian') }}" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">
                                        <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                        Pembelian Kendaraan</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/inquery_pembelian') }}" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">
                                        <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                        Inquery Pembelian</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</nav>
