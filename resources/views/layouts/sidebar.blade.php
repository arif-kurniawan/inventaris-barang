<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Inventaris <sup>App</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>
    @if (Auth::user()->hak_akses == 'admin')
        <li class="nav-item @if (Route::is('gedung.*')) active @endif">
            <a class="nav-link" href="{{ route('gedung.index') }}">
                <i class="far fa-building"></i>
                <span>Gedung</span>
            </a>
        </li>

        <li class="nav-item @if (Route::is('ruang.*')) active @endif">
            <a class="nav-link" href="{{ route('ruang.index') }}">
                <i class="far fa-building"></i>
                <span>Ruang</span>
            </a>
        </li>

        <li class="nav-item @if (Route::is('jenisbarang.*')) active @endif">
            <a class="nav-link" href="{{ route('jenisbarang.index') }}">
                <i class="fab fa-intercom"></i>
                <span>Jenis Barang</span>
            </a>
        </li>

        <li class="nav-item @if (Route::is('user.*')) active @endif">
            <a class="nav-link" href="{{ route('user.form') }}">
                <i class="fas fa-users"></i>
                <span>User</span>
            </a>
        </li>
    @endif
    @if (Auth::user()->hak_akses == 'admin' || Auth::user()->hak_akses == 'staff')

    <li class="nav-item @if (Route::is('barang.*')) active @endif">
        <a class="nav-link" href="{{ route('barang.index') }}">
            <i class="fas fa-cubes"></i>
            <span>Barang</span>
        </a>
    </li>
    @endif
    <!-- Nav Item - Pages Collapse Menu -->


    <!-- Nav Item - Utilities Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> --}}


    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
