<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Sistem Sarana Prasarana Sekolah')</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('purple/purple/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('purple/purple/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('purple/purple/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('purple/purple/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('purple/purple/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('purple/purple/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('purple/purple/assets/images/favicon.png') }}" />

    <style>
        /* Flat subtle non-gradient button styles */
        .btn-gradient-primary, .btn-primary {
            background: #4f46e5 !important;
            border: 1px solid #4f46e5 !important;
            color: #ffffff !important;
            box-shadow: none !important;
            border-radius: 6px;
        }
        .btn-gradient-primary:hover, .btn-primary:hover {
            background: #4338ca !important;
            border-color: #4338ca !important;
            color: #ffffff !important;
        }
        .btn-gradient-danger, .btn-danger {
            background: #ef4444 !important;
            border: 1px solid #ef4444 !important;
            color: #ffffff !important;
            box-shadow: none !important;
            border-radius: 6px;
        }
        .btn-gradient-danger:hover, .btn-danger:hover {
            background: #dc2626 !important;
            border-color: #dc2626 !important;
            color: #ffffff !important;
        }
        .btn-gradient-success, .btn-success {
            background: #10b981 !important;
            border: 1px solid #10b981 !important;
            color: #ffffff !important;
            box-shadow: none !important;
            border-radius: 6px;
        }
        .btn-gradient-success:hover, .btn-success:hover {
            background: #059669 !important;
            border-color: #059669 !important;
            color: #ffffff !important;
        }
        .btn-gradient-info, .btn-info {
            background: #0ea5e9 !important;
            border: 1px solid #0ea5e9 !important;
            color: #ffffff !important;
            box-shadow: none !important;
            border-radius: 6px;
        }
        .btn-gradient-info:hover, .btn-info:hover {
            background: #0284c7 !important;
            border-color: #0284c7 !important;
            color: #ffffff !important;
        }
        .btn-gradient-warning, .btn-warning {
            background: #f59e0b !important;
            border: 1px solid #f59e0b !important;
            color: #ffffff !important;
            box-shadow: none !important;
            border-radius: 6px;
        }
        .btn-gradient-warning:hover, .btn-warning:hover {
            background: #d97706 !important;
            border-color: #d97706 !important;
            color: #ffffff !important;
        }

        /* Flat subtle pill & chip badges (non-gradient) */
        .badge, 
        .badge-gradient-success, 
        .badge-gradient-warning, 
        .badge-gradient-danger, 
        .badge-gradient-info, 
        .badge-gradient-primary, 
        .badge-gradient-secondary {
            font-weight: 600;
            border-radius: 6px;
            padding: 5px 10px;
            font-size: 12px;
            letter-spacing: 0.2px;
            text-shadow: none !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .badge-success, .badge-gradient-success {
            background: #dcfce7 !important;
            color: #15803d !important;
            border: 1px solid #bbf7d0 !important;
        }
        .badge-warning, .badge-gradient-warning {
            background: #fef3c7 !important;
            color: #b45309 !important;
            border: 1px solid #fde68a !important;
        }
        .badge-danger, .badge-gradient-danger {
            background: #fee2e2 !important;
            color: #b91c1c !important;
            border: 1px solid #fecaca !important;
        }
        .badge-info, .badge-gradient-info, .badge-primary, .badge-gradient-primary {
            background: #e0e7ff !important;
            color: #4338ca !important;
            border: 1px solid #c7d2fe !important;
        }
        .badge-secondary, .badge-gradient-secondary {
            background: #f1f5f9 !important;
            color: #475569 !important;
            border: 1px solid #e2e8f0 !important;
        }
        .badge-outline-secondary {
            background: #f8fafc !important;
            color: #475569 !important;
            border: 1px solid #cbd5e1 !important;
        }

        .page-title-icon {
            background: #4f46e5 !important;
            border-radius: 8px;
        }

        /* Container safety & neatness */
        .content-wrapper {
            padding: 24px;
        }
        .card {
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
            border-radius: 10px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <a class="navbar-brand brand-logo" href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('pengguna.dashboard') }}">
                    <img src="{{ asset('purple/purple/assets/images/logo.svg') }}" alt="logo" />
                </a>
                <a class="navbar-brand brand-logo-mini" href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('pengguna.dashboard') }}">
                    <img src="{{ asset('purple/purple/assets/images/logo-mini.svg') }}" alt="logo" />
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <div class="search-field d-none d-md-block">
                    <div class="d-flex align-items-center h-100 ps-3">
                        <span class="badge {{ Auth::user()->role === 'admin' ? 'badge-danger' : 'badge-success' }}">
                            <i class="mdi mdi-shield-account me-1"></i> Mode: {{ Auth::user()->role === 'admin' ? 'Administrator' : 'Siswa / Pengguna' }}
                        </span>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="{{ asset('purple/purple/assets/images/faces/face1.jpg') }}" alt="profile">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black font-weight-bold">{{ Auth::user()->name }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <span class="dropdown-item text-muted">
                                <i class="mdi mdi-account-circle me-2 text-primary"></i> {{ Auth::user()->email }}
                            </span>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout me-2 text-danger"></i> Logout
                            </a>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block full-screen-link">
                        <a class="nav-link">
                            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                        </a>
                    </li>
                    <li class="nav-item nav-logout d-none d-lg-block">
                        <a class="nav-link" href="#" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-power text-danger"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="{{ asset('purple/purple/assets/images/faces/face1.jpg') }}" alt="profile" />
                                <span class="login-status online"></span>
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                                <span class="text-secondary text-small">{{ Auth::user()->role === 'admin' ? 'Administrator' : 'Siswa / Pengguna' }}</span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>

                    @if(Auth::user()->role === 'admin')
                        <!-- MENU KHUSUS ADMIN -->
                        <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <span class="menu-title">Dashboard Admin</span>
                                <i class="mdi mdi-home menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('admin.sarana.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.sarana.index') }}">
                                <span class="menu-title">Kelola Sarana Prasarana</span>
                                <i class="mdi mdi-office-building menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('admin.pengaduan.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pengaduan.index') }}">
                                <span class="menu-title">Kelola Pengaduan</span>
                                <i class="mdi mdi-bullhorn menu-icon"></i>
                            </a>
                        </li>
                    @else
                        <!-- MENU KHUSUS PENGGUNA / SISWA -->
                        <li class="nav-item {{ request()->routeIs('pengguna.dashboard') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('pengguna.dashboard') }}">
                                <span class="menu-title">Dashboard</span>
                                <i class="mdi mdi-home menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('pengguna.sarana.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('pengguna.sarana.index') }}">
                                <span class="menu-title">Data Sarana Prasarana</span>
                                <i class="mdi mdi-view-list menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('pengguna.pengaduan.create') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('pengguna.pengaduan.create') }}">
                                <span class="menu-title">Formulir Pengaduan</span>
                                <i class="mdi mdi-lead-pencil menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('pengguna.pengaduan.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('pengguna.pengaduan.index') }}">
                                <span class="menu-title">Riwayat Pengaduan</span>
                                <i class="mdi mdi-history menu-icon"></i>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item sidebar-actions">
                        <span class="nav-link">
                            <div class="border-bottom">
                                <h6 class="font-weight-normal mb-3">Akun</h6>
                            </div>
                            <button type="button" class="btn btn-block btn-lg btn-danger mt-4 w-100" onclick="document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout me-2"></i> Logout
                            </button>
                        </span>
                    </li>
                </ul>
            </nav>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-alert-circle me-2"></i> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('info'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-information me-2"></i> {{ session('info') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @yield('content')
                </div>

                <!-- Footer -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                            Copyright © 2026 <strong>Sistem Pengaduan Sarana Prasarana Sekolah</strong>.
                        </span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                            Handcrafted with care
                        </span>
                    </div>
                </footer>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- Form Logout Tersembunyi -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <!-- plugins:js -->
    <script src="{{ asset('purple/purple/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('purple/purple/assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('purple/purple/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('purple/purple/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('purple/purple/assets/js/misc.js') }}"></script>
    <script src="{{ asset('purple/purple/assets/js/settings.js') }}"></script>
    <script src="{{ asset('purple/purple/assets/js/todolist.js') }}"></script>
    <script src="{{ asset('purple/purple/assets/js/jquery.cookie.js') }}"></script>
    @stack('scripts')
</body>
</html>
