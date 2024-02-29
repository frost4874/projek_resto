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
   @include('layouts.nav')

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
                    <label for="guest_number">Jumlah Tamu (Maksimal 10)</label>
                     <input type="text" class="form-control" id="guest_number" name="guest_number" placeholder="Number of Guests" required maxlength="2" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)">
                     <span id="guestNumberError" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="notes">Special Requests</label>
                    <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block" onclick="confirmBooking()">Book Now</button>
                <a href="{{ route('daftar_booking') }}" class="btn btn-secondary btn-block">Cek Daftar Booking</a>
            </form>
        </div>
    </div>
</div>



<!-- Bootstrap JS and dependencies -->
<script>
    document.getElementById('guest_number').addEventListener('input', function() {
        var guestNumber = parseInt(this.value);
        if (guestNumber < 1 || guestNumber > 10) {
            document.getElementById('guestNumberError').innerText = 'Maksimal Jumlah Tamu 10 Orang';
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
            // If confirmed, show success modal and submit the form
            showBookingSuccessModal();
            document.getElementById('bookingForm').submit();
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
