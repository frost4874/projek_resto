    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profil Pengguna</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
            body {
                background-image: url('resto1.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                height: 100vh;
                margin: 0;
                padding: 0;
            }
            header {
                background-color: rgba(52, 58, 64, 0.9);
                color: #fff;
                padding: 10px 0;
            }
            .container {
                padding-top: 50px;
            }
            .form-group label {
                color: #fff;
            }
            .form-control {
                background-color: rgba(255, 255, 255, 0.5);
                color: #000;
            }
            .btn-primary {
                background-color: #007bff;
                border-color: #007bff;
            }
            .btn-primary:hover {
                background-color: #0056b3;
                border-color: #0056b3;
            }
            .table {
                background-color: rgba(255, 255, 255, 0.5);
                color: #000;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Booking Restoran</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Menu 1</a>
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
                            <a class="dropdown-item" href="{{ route('profile') }}">Profil</a>
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

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h5 class="card-header">Profil Pengguna</h5>
                        <div class="card-body">
                            <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                            <!-- Tambah informasi profil lainnya sesuai kebutuhan -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
