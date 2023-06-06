<nav class="navbar navbar-expand-lg bg-white border-bottom border-danger">
    <div class="container py-1">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item ">
                    <a class="nav-link " href="/">
                        <i class="bi bi-house-door"></i> Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pendonor.index') }}">
                        <i class="bi bi-activity"></i> Pendonor
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index.pasien') }}">
                        <i class="bi bi-folder-check"></i> Pasien PMI
                    </a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.historiku') }}">
                            <i class="bi bi-clock-history"></i> Historiku
                        </a>
                    </li>
                @endauth
            </ul>
            @auth
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            @role('admin')
                                <li><a class="dropdown-item" href="{{ route('admin.home') }}">Dashboard</a></li>
                            @endrole
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            @endauth

            @guest
                <div class="d-grid gap-2 d-md-block">
                    <a href="{{ route('formLogin') }}" class="btn btn-outline-danger px-5 me-2" type="button">Masuk</a>
                    <a href="{{ route('formReg') }}" class="btn btn-danger px-5" type="button">Daftar</a>
                </div>
            @endguest
        </div>
    </div>
</nav>
