<nav class="navbar navbar-light navbar-vertical navbar-expand-xl navbar-vibrant">
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">

            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
                data-bs-placement="left" title="" data-bs-original-title="Toggle Navigation"
                aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                        class="toggle-line"></span></span></button>
        </div><a class="navbar-brand" href="index.html">
            <div class="d-flex align-items-center py-3"><span class="font-sans-serif" style="font-size: 20px;">
                    <img class="" src="{{ asset('storage/uploads/gambaricon/omegapolos.png') }}"
                        alt="AdminLTELogo" height="37" width="160">
                </span>
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

                    {{-- master  --}}
                    <a class="nav-link dropdown-indicator" href="#email" role="button" data-bs-toggle="collapse"
                        aria-expanded="true" aria-controls="email">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-grip-horizontal"></span>
                            </span>
                            <span class="nav-link-text ps-1">MASTER</span>
                        </div>
                    </a>

                    <ul class="nav false collapse show" id="email" style="">
                        @if (auth()->check() && auth()->user()->menu['karyawan'])
                            <li class="nav-item"><a class="nav-link"href="{{ url('admin/karyawan') }}"
                                    aria-expanded="false">
                                    <span class="nav-link-text ps-1">
                                        <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                        Data Karyawan</span>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['user'])
                            <li class="nav-item"><a class="nav-link" href="{{ url('admin/user') }}"
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Data User</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['akses'])
                            <li class="nav-item"><a class="nav-link" href="{{ url('admin/akses') }}"
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Hak Akses</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['departemen'])
                            <li class="nav-item"><a class="nav-link" href="{{ url('admin/departemen') }}"
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Data Departemen</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['marketing'])
                            <li class="nav-item"><a class="nav-link" href="{{ url('admin/marketing') }}"
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Data Marketing</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['merek'])
                            <li class="nav-item"><a class="nav-link" href="{{ url('admin/merek') }}"
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Data Merek</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['kendaraan'])
                            <li class="nav-item"><a class="nav-link" href="{{ url('admin/kendaraan') }}"
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Data Kendaraan</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['pelanggan'])
                            <li class="nav-item"><a class="nav-link" href="{{ url('admin/pelanggan') }}"
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Data Pelanggan</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                    </ul>

                    {{-- Transaksi  --}}

                    <a class="nav-link dropdown-indicator" href="#transaksi" role="button"
                        data-bs-toggle="collapse" aria-expanded="true" aria-controls="email">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-exchange-alt"></span>
                            </span>
                            <span class="nav-link-text ps-1">TRANSAKSI</span>
                        </div>
                    </a>

                    <ul class="nav false collapse show" id="transaksi" style="">
                        @if (auth()->check() && auth()->user()->menu['pembelian kendaraan'])
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
                        @endif
                        @if (auth()->check() && auth()->user()->menu['penjualan kendaraan'])
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/penjualan') }}" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Penjualan Kendaraan</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['komisi marketing'])
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/komisi') }}" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Komisi Marketing</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['inquery pembelian'])
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/inquery_pembelian') }}"
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Inquery Pembelian</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['inquery penjualan'])
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/inquery_penjualan') }}"
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Inquery Penjualan</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['inquery komisi'])
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/inquery_komisi') }}" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Inquery Komisi</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                    </ul>

                    {{-- Laporan  --}}
                    <a class="nav-link dropdown-indicator" href="#laporan" role="button" data-bs-toggle="collapse"
                        aria-expanded="true" aria-controls="email">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fas fa-clipboard-list"></span>
                            </span>
                            <span class="nav-link-text ps-1">LAPORAN</span>
                        </div>
                    </a>

                    <ul class="nav false collapse show" id="laporan" style="">
                        @if (auth()->check() && auth()->user()->menu['laporan pembelian'])
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/laporan_pembelian') }}"
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Laporan Pembelian</span>
                                    </div>
                                </a>
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['laporan penjualan'])
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/laporan_penjualan') }}"
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Laporan Penjualan</span>
                                    </div>
                                </a>
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['laporan komisi'])
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/laporan_komisi') }}" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Laporan Komisi</span>
                                    </div>
                                </a>
                            </li>
                    </ul>
                    @endif
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modalLogout" href="#">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-sign-out-alt"></span>
                            </span>
                            <span class="nav-link-text ps-1">LOG OUT</span>
                        </div>
                    </a>
            </ul>
        </div>
    </div>

</nav>
