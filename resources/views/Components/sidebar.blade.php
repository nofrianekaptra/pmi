<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SANDRA<sup>PMI</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::is('admin.home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.home') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        master data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item {{ Route::is('kategori.*', 'pendataan.*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>MD &mdash; Darah</span>
        </a>
        <div id="collapseTwo" class="collapse {{ Route::is('kategori.*', 'pendataan.*') ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Data</h6>
                <a class="collapse-item {{ Route::is('kategori.*') ? 'active' : '' }}"
                    href="{{ route('kategori.index') }}">Golongan Darah</a>
                <a class="collapse-item  {{ Route::is('pendataan.*') ? 'active' : '' }}"
                    href="{{ route('pendataan.index') }}">Pendataan Stok</a>
            </div>
        </div>
    </li> --}}

    <li class="nav-item {{ Route::is('kategori.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kategori.index') }}">
            <i class="fas fa-fw fa-hand-holding-medical"></i>
            <span>Kategori Gol. Darah</span></a>
    </li>

    <li class="nav-item {{ Route::is('pendataan.pendonor') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pendataan.pendonor') }}">
            <i class="fas fa-fw fa-syringe"></i>
            <span>Darah Masuk (Pendonor)</span></a>
    </li>

    <li class="nav-item {{ Route::is('pendataan.penerima') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pendataan.penerima') }}">
            <i class="fas fa-fw fa-stethoscope"></i>
            <span>Darah Keluar (Penerima)</span></a>
    </li>

    <li class="nav-item {{ Route::is('laporan.pendonor') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laporan.pendonor') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Data Laporan Pendonor</span></a>
    </li>

    <li class="nav-item {{ Route::is('laporan.penerima') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laporan.penerima') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Data Laporan Penerima</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
