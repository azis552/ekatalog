        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="{{ asset('admin') }}/index.html" class="logo">
                            <img src="{{ asset('admin') }}/assets/img/kaiadmin/favicon.ico" alt="navbar brand"
                                class="navbar-brand" height="20" />
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
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <nav
                            class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pe-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control" />
                            </div>
                        </nav>
                        @if (Auth::user()->role != 'admin')
                            @if (Auth::user()->berkas == null)
                                @if (Auth::user()->pemerintah == null)
                                    <button type="button" class="btn btn-primary" style="margin-left : 4px;"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Daftar Vendor
                                    </button>
                                @endif
                            @endif
                            @if (Auth::user()->pemerintah == null)
                                <button type="button" class="btn btn-primary" style="margin-left : 4px;"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                    Daftar Instansi Pemerintah
                                </button>
                            @endif
                        @endif

                        <a href="{{ route('landing') }}" type="button" class="btn btn-primary" style="margin-left : 4px;" >Halaman Beranda</a>




                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                    href="{{ asset('admin') }}/#" role="button" aria-expanded="false"
                                    aria-haspopup="true">
                                    <i class="fa fa-search"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-search animated fadeIn">
                                    <form class="navbar-left navbar-form nav-search">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search ..." class="form-control" />
                                        </div>
                                    </form>
                                </ul>
                            </li>

                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="{{ asset('admin') }}/#" id="notifDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="notification">4</span>
                                </a>
                                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                    <li>
                                        <div class="dropdown-title">
                                            You have 4 new notification
                                        </div>
                                    </li>
                                    <li>
                                        <div class="notif-scroll scrollbar-outer">
                                            <div class="notif-center">
                                                <a href="{{ asset('admin') }}/#">
                                                    <div class="notif-icon notif-primary">
                                                        <i class="fa fa-user-plus"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block"> New user registered </span>
                                                        <span class="time">5 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="{{ asset('admin') }}/#">
                                                    <div class="notif-icon notif-success">
                                                        <i class="fa fa-comment"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block">
                                                            Rahmad commented on Admin
                                                        </span>
                                                        <span class="time">12 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="{{ asset('admin') }}/#">
                                                    <div class="notif-img">
                                                        <img src="{{ asset('admin') }}/assets/img/profile2.jpg"
                                                            alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block">
                                                            Reza send messages to you
                                                        </span>
                                                        <span class="time">12 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="{{ asset('admin') }}/#">
                                                    <div class="notif-icon notif-danger">
                                                        <i class="fa fa-heart"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block"> Farrah liked Admin </span>
                                                        <span class="time">17 minutes ago</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="see-all" href="{{ asset('admin') }}/javascript:void(0);">See all
                                            notifications<i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown"
                                    href="{{ asset('admin') }}/#" aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="{{ asset('admin') }}/assets/img/profile.jpg" alt="..."
                                            class="avatar-img rounded-circle" />
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Hi,</span>
                                        <span class="fw-bold">{{ Auth::user()->name }}</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    <img src="{{ asset('admin') }}/assets/img/profile.jpg"
                                                        alt="image profile" class="avatar-img rounded" />
                                                </div>
                                                <div class="u-text">
                                                    <h4>{{ Auth::user()->name }}</h4>
                                                    <p class="text-muted">{{ Auth::user()->email }}</p>
                                                    <a href="{{ asset('admin') }}/profile.html"
                                                        class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ asset('admin') }}/#">My Profile</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ asset('admin') }}/#">Account
                                                Setting</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
                @if ($errors->any())
                    <div class="alert-container position-fixed top-0 end-0 p-3">
                        <div class="alert alert-danger alert-dismissible fade show small-alert" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert-container position-fixed top-0 end-0 p-3">
                        <div class="alert alert-success alert-dismissible fade show small-alert" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert-container position-fixed top-0 end-0 p-3">
                        <div class="alert alert-danger alert-dismissible fade show small-alert" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endif

            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Pengajuan Vendor</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('vendor.store') }}" method="post" enctype="multipart/form-data">

                                @csrf
                                <div class="mb-3">
                                    <label for="">Nama Perusahaan</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Masukkan Nama Perusahaan">
                                </div>
                                <div class="mb-3">
                                    <label for="">Deskripsi Perusahaan</label>
                                    <input type="text" class="form-control" name="keterangan"
                                        placeholder="Keterangan Perusahaan">
                                </div>
                                <div class="mb-3">
                                    <label for="">Tipe Perusahaan</label>
                                    <input type="text" class="form-control" name="tipe"
                                        placeholder="Masukkan Tipe Perusahaan">
                                </div>
                                <div class="mb-3">
                                    <label for="">Alamat Perusahaan</label>
                                    <input type="text" class="form-control" name="alamat"
                                        placeholder="Masukkan Alamat Perusahaan">
                                </div>
                                <div class="mb-3">
                                    <label for="">Foto</label>
                                    <input type="file" class="form-control" name="foto">
                                </div>
                                <div class="mb-3">
                                    <label for="">Berkas</label>
                                    <input type="file" class="form-control" name="file">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Pengajuan Instansi Pemerintah</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('pemerintah.store') }}" method="post"
                                enctype="multipart/form-data">

                                @csrf
                                <div class="mb-3">
                                    <label for="">Nama Instansi Pemerintah</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Masukkan Nama Perusahaan">
                                </div>
                                <div class="mb-3">
                                    <label for="">Alamat Instansi Pemerintah</label>
                                    <input type="text" class="form-control" name="alamat"
                                        placeholder="Masukkan Alamat Perusahaan">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
