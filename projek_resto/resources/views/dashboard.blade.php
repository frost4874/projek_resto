<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Restoran</title>
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
                        <a class="dropdown-item" href="">Pengaturan Akun</a>
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4" style="color: #fff;">Booking Restoran</h2>
            <form id="bookingForm" action="{{ route('booking.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Pemesan</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <label for="restaurant">Pilih Restoran/Cafe</label>
                    <select class="form-control" id="restaurant" name="restaurant" required>
                        <option value="Grand Cafe">Grand Cafe</option>
                        <option value="Disscuss Cafe">Disscuss Cafe</option>
                        <option value="Rekopi Cafe">Rekopi Cafe</option>
                    </select>
                </div>
                <input type="hidden" id="selected-restaurant" name="selected-restaurant">
                <div class="form-group">
                    <label for="booking_time">Booking Time</label>
                    <input type="datetime-local" class="form-control" id="booking_time" name="booking_time" required>
                </div>
                <div class="form-group">
                    <label for="guest_number">Jumlah Tamu</label>
                     <input type="text" class="form-control" id="guest_number" name="guest_number" placeholder="Number of Guests" required maxlength="2" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                     <span id="guestNumberError" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="notes">Special Requests</label>
                    <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                </div>
                <button type="button" class="btn btn-primary btn-block" onclick="confirmBooking()">Book Now</button>
                <a href="{{ route('daftar_booking') }}" class="btn btn-secondary btn-block">Cek Daftar Booking</a>
            </form>
        </div>
    </div>
</div>

<!-- Booking Success Modal -->
<div class="modal fade" id="bookingSuccessModal" tabindex="-1" role="dialog" aria-labelledby="bookingSuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingSuccessModalLabel">Booking Successful</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Your booking has been successfully made.
            </div>
                    </div>
    </div>
</div>


<script>
    document.getElementById('restaurant').addEventListener('change', function() {
        var selectedRestaurant = this.value;
        document.getElementById('selected-restaurant').value = selectedRestaurant;
    });

    document.getElementById('guest_number').addEventListener('input', function() {
        var guestNumber = parseInt(this.value);
        if (guestNumber < 1 || guestNumber > 10) {
            document.getElementById('guestNumberError').innerText = 'Number of guests must be between 1 and 10.';
        } else {
            document.getElementById('guestNumberError').innerText = '';
        }
    });

    // Function to show booking success modal
    function showBookingSuccessModal() {
        $('#bookingSuccessModal').modal('show');
    }

    // Function to confirm before submitting booking
    function confirmBooking() {
        var confirmation = window.confirm('Apakah data yang Anda masukkan sudah benar?');
        if (confirmation) {
            // If confirmed, show success modal and submit the form after a short delay
            showBookingSuccessModal();
            setTimeout(() => {
                document.getElementById('bookingForm').submit();
            }, 5000); // Adjust the delay as needed
        } else {
            // If not confirmed, do nothing
            return false;
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
