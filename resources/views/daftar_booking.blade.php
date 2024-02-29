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
            background: url('restoran.jpg') no-repeat center center fixed;
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
            background-color: #fff; /* Set background color to opaque white */
            color: #000;
        }
    </style>
</head>
<body>
@include('layouts.nav')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4" style="color: #fff;">Daftar Booking Hari ini</h2>
                <!-- Filter form -->
                <form action="{{ route('filterByDate') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="booking_date" style="color: #fff;">Filter by Booking Date:</label>
                        <input type="date" class="form-control" id="booking_date" name="booking_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>
        </div>

        <!-- Table booking -->
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-rounded">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nama Pemesan</th>
                                <th scope="col">Restoran/Cafe</th>
                                <th scope="col">
                                    Booking Time
                                    <button class="btn btn-sm btn-outline-primary" onclick="sortTable(2, 'asc')"><i class="fas fa-sort-up"></i></button>
                                    <button class="btn btn-sm btn-outline-primary" onclick="sortTable(2, 'desc')"><i class="fas fa-sort-down"></i></button>
                                </th>
                                <th scope="col">Jumlah Tamu</th>
                                <th scope="col">Special Requests</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($bookings) && $bookings->count() > 0)
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->name }}</td>
                                        <td>{{ $booking->restaurant }}</td>
                                        <td>{{ $booking->booking_time }}</td>
                                        <td>{{ $booking->guest_number }}</td>
                                        <td>{{ $booking->notes }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">Tidak ada data booking untuk ditampilkan.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                
        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
            <li class="page-item {{ $bookings->previousPageUrl() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $bookings->previousPageUrl() }}" aria-label="Previous">&laquo; Previous</a>
            </li>
            @for ($i = 1; $i <= $bookings->lastPage(); $i++)
            <li class="page-item {{ $i == $bookings->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $bookings->url($i) }}">{{ $i }}</a>
            </li>
            @endfor
            <li class="page-item {{ $bookings->nextPageUrl() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $bookings->nextPageUrl() }}" aria-label="Next">Next &raquo;</a>
        </li>
    </ul>
</nav>

            </div>
        </div>
    </div>

    <script>
        function sortTable(n, order) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.querySelector("table");
            switching = true;
            dir = order === 'asc' ? 'asc' : 'desc';
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
