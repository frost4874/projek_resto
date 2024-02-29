<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/dashboard">Booking Restoran</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/dashboard">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/daftar_booking">Daftar Booking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Menu 2</a>
                </li>
            </ul>
            @auth
                <div class="dropdown">
                    <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> Selamat datang, {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/profile">Profil</a>
                        <a class="dropdown-item" href="#">Pengaturan Akun</a>
                        <div class="dropdown-divider"></div>
                        <form class="dropdown-item" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link">Logout</button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </nav>
