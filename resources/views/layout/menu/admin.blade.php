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
                        <div class="col-auto navbar-vertical-label">Menu
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider">
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link dropdown-indicator" href="#" role="button" data-bs-toggle="collapse"
                        data-bs-target="#masterSubMenu" aria-expanded="true" aria-controls="e-commerce">
                        <div class="d-flex align-items-center"> <span class="nav-link-icon">
                                <span class="fas fa-grip-horizontal"></span>
                            </span>
                            <span class="nav-link-text ps-1" style="color:white">MASTER</span>
                        </div>
                    </a>
                    <ul class="nav collapse {{ request()->is('admin/karyawan*') || request()->is('admin/user*') || request()->is('admin/akses*') || request()->is('admin/departemen*') || request()->is('admin/marketing*') || request()->is('admin/merek*') || request()->is('admin/kendaraan*') || request()->is('admin/pelanggan*') ? 'show' : '' }}"
                        id="masterSubMenu">
                        @if (auth()->check() && auth()->user()->menu['karyawan'])
                            @php
                                $isActive = request()->is('admin/karyawan*');
                                $backgroundColor = $isActive ? 'background-color: black;' : '';
                                $textColor = $isActive ? 'color: white;' : '';
                            @endphp

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/karyawan') }}" aria-expanded="false"
                                    style="{{ $backgroundColor }} {{ $textColor }}">
                                    <span class="nav-link-text ps-1">
                                        <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                        Data Karyawan</span>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['user'])
                            @php
                                $isActive = request()->is('admin/user*');
                                $backgroundColor = $isActive ? 'background-color: black;' : '';
                                $textColor = $isActive ? 'color: white;' : '';
                            @endphp

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/user') }}" aria-expanded="false"
                                    style="{{ $backgroundColor }} {{ $textColor }}">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Data User</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['akses'])
                            @php
                                $isActive = request()->is('admin/akses*');
                                $backgroundColor = $isActive ? 'background-color: black;' : '';
                                $textColor = $isActive ? 'color: white;' : '';
                            @endphp

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/akses') }}" aria-expanded="false"
                                    style="{{ $backgroundColor }} {{ $textColor }}">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Hak Akses</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['departemen'])
                            @php
                                $isActive = request()->is('admin/departemen*');
                                $backgroundColor = $isActive ? 'background-color: black;' : '';
                                $textColor = $isActive ? 'color: white;' : '';
                            @endphp

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/departemen') }}" aria-expanded="false"
                                    style="{{ $backgroundColor }} {{ $textColor }}">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Data Departemen</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['marketing'])
                            @php
                                $isActive = request()->is('admin/marketing*');
                                $backgroundColor = $isActive ? 'background-color: black;' : '';
                                $textColor = $isActive ? 'color: white;' : '';
                            @endphp

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/marketing') }}" aria-expanded="false"
                                    style="{{ $backgroundColor }} {{ $textColor }}">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Data Marketing</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['merek'])
                            @php
                                $isActive = request()->is('admin/merek*');
                                $backgroundColor = $isActive ? 'background-color: black;' : '';
                                $textColor = $isActive ? 'color: white;' : '';
                            @endphp

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/merek') }}" aria-expanded="false"
                                    style="{{ $backgroundColor }} {{ $textColor }}">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Data Merek</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['kendaraan'])
                            @php
                                $isActive = request()->is('admin/kendaraan*');
                                $backgroundColor = $isActive ? 'background-color: black;' : '';
                                $textColor = $isActive ? 'color: white;' : '';
                            @endphp

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/kendaraan') }}" aria-expanded="false"
                                    style="{{ $backgroundColor }} {{ $textColor }}">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Data Kendaraan</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['pelanggan'])
                            @php
                                $isActive = request()->is('admin/pelanggan*');
                                $backgroundColor = $isActive ? 'background-color: black;' : '';
                                $textColor = $isActive ? 'color: white;' : '';
                            @endphp

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/pelanggan') }}" aria-expanded="false"
                                    style="{{ $backgroundColor }} {{ $textColor }}">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Data Pelanggan</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        @endif
                    </ul>

                </li>

                <li class="nav-item">
                    <a class="nav-link dropdown-indicator" href="#" role="button" data-bs-toggle="collapse"
                        data-bs-target="#transaksi" aria-expanded="true" aria-controls="e-commerce">
                        <div class="d-flex align-items-center"> <span class="nav-link-icon">
                                <span class="fas fa-exchange-alt"></span>
                            </span>
                            <span class="nav-link-text ps-1" style="color:white">TRANSAKSI</span>
                        </div>
                    </a>
                    <ul class="nav collapse {{ request()->is('admin/pembelian*') || request()->is('admin/penjualan*') || request()->is('admin/komisi*') || request()->is('admin/inquery_pembelian*') || request()->is('admin/inquery_penjualan*') || request()->is('admin/inquery_komisi*') ? 'show' : '' }}"
                        id="transaksi">
                        @if (auth()->check() && auth()->user()->menu['pembelian kendaraan'])
                            @php
                                $isActive = request()->is('admin/pembelian*');
                                $backgroundColor = $isActive ? 'background-color: black;' : '';
                                $textColor = $isActive ? 'color: white;' : '';
                            @endphp

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/pembelian') }}" aria-expanded="false"
                                    style="{{ $backgroundColor }} {{ $textColor }}">
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
                            @php
                                $isActive = request()->is('admin/penjualan*');
                                $backgroundColor = $isActive ? 'background-color: black;' : '';
                                $textColor = $isActive ? 'color: white;' : '';
                            @endphp

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/penjualan') }}" aria-expanded="false"
                                    style="{{ $backgroundColor }} {{ $textColor }}">
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
                            @php
                                $isActive = request()->is('admin/komisi*');
                                $backgroundColor = $isActive ? 'background-color: black;' : '';
                                $textColor = $isActive ? 'color: white;' : '';
                            @endphp

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/komisi') }}" aria-expanded="false"
                                    style="{{ $backgroundColor }} {{ $textColor }}">
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
                            @php
                                $isActive = request()->is('admin/inquery_pembelian*');
                                $backgroundColor = $isActive ? 'background-color: black;' : '';
                                $textColor = $isActive ? 'color: white;' : '';
                            @endphp

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/inquery_pembelian') }}"
                                    aria-expanded="false" style="{{ $backgroundColor }} {{ $textColor }}">
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
                            @php
                                $isActive = request()->is('admin/inquery_penjualan*');
                                $backgroundColor = $isActive ? 'background-color: black;' : '';
                                $textColor = $isActive ? 'color: white;' : '';
                            @endphp

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/inquery_penjualan') }}"
                                    aria-expanded="false" style="{{ $backgroundColor }} {{ $textColor }}">
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
                            @php
                                $isActive = request()->is('admin/inquery_komisi*');
                                $backgroundColor = $isActive ? 'background-color: black;' : '';
                                $textColor = $isActive ? 'color: white;' : '';
                            @endphp

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/inquery_komisi') }}" aria-expanded="false"
                                    style="{{ $backgroundColor }} {{ $textColor }}">
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

                </li>

                <li class="nav-item">
                    <a class="nav-link dropdown-indicator" href="#" role="button" data-bs-toggle="collapse"
                        data-bs-target="#laporan" aria-expanded="true" aria-controls="e-commerce">
                        <div class="d-flex align-items-center"> <span class="nav-link-icon">
                                <span class="fas fas fa-clipboard-list"></span>
                            </span>
                            <span class="nav-link-text ps-1" style="color:white">LAPORAN</span>
                        </div>
                    </a>
                    <ul class="nav collapse{{ request()->is('admin/laporan_pembelian*') || request()->is('admin/laporan_penjualan*') || request()->is('admin/laporan_komisi*') ? 'show' : '' }}"
                        id="laporan">
                        @if (auth()->check() && auth()->user()->menu['laporan pembelian'])
                            @php
                                $isActive = request()->is('admin/laporan_pembelian*');
                                $backgroundColor = $isActive ? 'background-color: black;' : '';
                                $textColor = $isActive ? 'color: white;' : '';
                            @endphp
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/laporan_pembelian') }}"
                                    aria-expanded="false" style="{{ $backgroundColor }} {{ $textColor }}">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Laporan Pembelian
                                        </span>
                                    </div>
                                </a>
                            </li>
                        @endif

                        @if (auth()->check() && auth()->user()->menu['laporan penjualan'])
                            @php
                                $isActive = request()->is('admin/laporan_penjualan*');
                                $backgroundColor = $isActive ? 'background-color: black;' : '';
                                $textColor = $isActive ? 'color: white;' : '';
                            @endphp

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/laporan_penjualan') }}"
                                    aria-expanded="false" style="{{ $backgroundColor }} {{ $textColor }}">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Laporan Penjualan
                                        </span>
                                    </div>
                                </a>
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['laporan komisi'])
                            @php
                                $isActive = request()->is('admin/laporan_komisi*');
                                $backgroundColor = $isActive ? 'background-color: black;' : '';
                                $textColor = $isActive ? 'color: white;' : '';
                            @endphp
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/laporan_komisi') }}" aria-expanded="false"
                                    style="{{ $backgroundColor }} {{ $textColor }}">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Laporan Komisi</span>
                                    </div>
                                </a>
                            </li>
                        @endif
                        @if (auth()->check() && auth()->user()->menu['laporan komisi'])
                            @php
                                $isActive = request()->is('admin/laporan_komisi*');
                                $backgroundColor = $isActive ? 'background-color: black;' : '';
                                $textColor = $isActive ? 'color: white;' : '';
                            @endphp
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/laporan_komisi') }}" aria-expanded="false"
                                    style="{{ $backgroundColor }} {{ $textColor }}">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">
                                            <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                            Test</span>
                                    </div>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>

                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Profil
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider">
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    @php
                        $isActive = request()->is('admin/profile*');
                        $backgroundColor = $isActive ? 'background-color: black;' : '';
                        $textColor = $isActive ? 'color: white;' : '';
                    @endphp
                    <a class="nav-link" href="{{ url('admin/profile') }}" aria-expanded="false"
                        style="{{ $backgroundColor }} {{ $textColor }}">
                        <div class="d-flex align-items-center"> <span class="nav-link-icon">
                                <span class="fas fas fa-user-edit"></span>
                            </span>
                            <span class="nav-link-text ps-1" style="color:white">Update Profil</span>
                        </div>
                    </a>
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modalLogout" href="#">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-sign-out-alt"></span>
                            </span>
                            <span class="nav-link-text ps-1" style="color:white">Logout</span>
                        </div>
                    </a>
                </li>




                {{-- Transaksi  --}}

        </div>
    </div>

</nav>
