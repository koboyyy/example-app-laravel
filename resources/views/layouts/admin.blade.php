<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Belajar Framework Laravel</title>

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('asset/vendors/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('asset/vendors/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('asset/vendors/images/favicon-16x16.png') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('asset/vendors/styles/core.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendors/styles/icon-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendors/styles/style.css') }}">
</head>

<body>

<!-- HEADER -->
<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
    </div>

    <div class="header-right">
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{ url('asset/vendors/images/photo1.jpg') }}">
                    </span>

                
                    <span class="user-name">
                        {{ Auth::check() ? Auth::user()->name : 'Guest' }}
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Log Out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SIDEBAR -->
<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ url('/dashboard') }}">
            <img src="{{ url('asset/vendors/images/deskapp-logo.svg') }}" class="dark-logo">
            <img src="{{ url('asset/vendors/images/deskapp-logo-white.svg') }}" class="light-logo">
        </a>
    </div>

    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">

            
                <li>
                    <a href="{{ url('/dashboard') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span>
                        <span class="mtext">Beranda</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-library"></span>
                        <span class="mtext">Menu</span>
                    </a>
                    <ul class="submenu">

                    
                        <li>
                            <a href="{{ url('/admin/mahasiswa') }}">
                                Data Mahasiswa
                            </a>
                        </li>
                         <li>
                            <a href="{{ url('/admin/jurusan') }}">
                                Data Jurusan
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/prodi') }}">
                                Data Prodi
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/mahasiswa/create') }}">
                                Input
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>

<div class="mobile-menu-overlay"></div>

<!-- CONTENT -->
<div class="main-container">
    <div class="pd-ltr-20">

        @yield('content')

        <div class="footer-wrap pd-20 mb-20 card-box">
            Created By Anda
        </div>
    </div>
</div>

<!-- JS -->
<script src="{{ asset('asset/vendors/scripts/core.js') }}"></script>
<script src="{{ asset('asset/vendors/scripts/script.min.js') }}"></script>
<script src="{{ asset('asset/vendors/scripts/process.js') }}"></script>
<script src="{{ asset('asset/vendors/scripts/layout-settings.js') }}"></script>

<script src="{{ asset('asset/src/plugins/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ asset('asset/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('asset/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('asset/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('asset/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('asset/vendors/scripts/dashboard.js') }}"></script>

<!-- DATATABLE BUTTON -->
<script src="{{ asset('asset/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('asset/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('asset/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('asset/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('asset/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('asset/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('asset/src/plugins/datatables/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('asset/vendors/scripts/datatable-setting.js') }}"></script>

</body>
</html>