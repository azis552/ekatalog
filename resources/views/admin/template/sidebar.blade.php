<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>E-Katalog</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('admin') }}/assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('admin') }}/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('admin/assets/css/fonts.min.css') }}"]
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/plugins.min.css" />
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/kaiadmin.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/css.gg/icons/all.css" rel="stylesheet">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/demo.css" />
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="{{ asset('admin') }}/index.html" class="logo">
                        <img src="{{ asset('admin') }}/assets/img/kaiadmin/favicon.ico" alt="navbar brand"
                            class="navbar-brand" height="50" />
                        <span class="text-white" style="margin-left: 5px; font-weight: bold ;">E-Katalog</span>
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
                            <a  href="{{ route('home') }}" class="collapsed"
                                aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Components</h4>
                        </li>
                        @if (Auth::user()->role == 'admin')
                            <li class="nav-item {{ Route::is('vendor.index') ? 'active' : '' }}">
                                <a  href="{{ route('vendor.index') }}" >
                                    <i class="fas fa-address-card"></i>
                                    <p>Vendor</p>
                                </a>
                            </li>
                            <li class="nav-item {{ Route::is('pemerintah.index') ? 'active' : '' }}">
                                <a  href="{{ route('pemerintah.index') }}" >
                                    <i class="fas fa-tags"></i>
                                    <p>pemerintah</p>
                                </a>
                            <li class="nav-item {{ Route::is('produk.index') ? 'active' : '' }}">
                                <a  href="{{ route('produk.index') }}" >
                                    <i class="fas fa-file"></i>
                                    <p>Produk</p>
                                </a>
                            </li>
                        @endif

                        @if (Auth::user()->role != 'admin' && @Auth::user()->berkas->status == 'Setuju')
                            <li class="nav-item {{ Route::is('produk.index') ? 'active' : '' }}">
                                <a  href="{{ route('produk.index') }}" >
                                    <i class="fas fa-file"></i>
                                    <p>Produk</p>
                                </a>
                            </li>
                            
                        @endif
                        @if (Auth::user()->role != 'admin' && @Auth::user()->pemerintah->status == 'Setuju')
                            <li class="nav-item {{ Route::is('transaksi.index') ? 'active' : '' }}">
                                <a  href="{{ route('transaksi.index') }}" >
                                    <i class="fas fa-shopping-basket"></i>
                                    <p>Pemesanan</p>
                                </a>
                            </li>
                            
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->
