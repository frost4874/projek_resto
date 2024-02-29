<!DOCTYPE html>
<html lang="en">
@include('layouts.head_profile')
    <body>
        @include('layouts.nav')

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
