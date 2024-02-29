<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DaftarBookingController extends Controller
{
    public function show()
    {
        $bookings = Booking::whereDate('booking_time', Carbon::today())->paginate(10);
        return view('daftar_booking', compact('bookings'));
    }

    public function filterByDate(Request $request)
    {
        $selectedDate = $request->input('booking_date');
        $bookings = Booking::whereDate('booking_time', $selectedDate)->paginate(10);
        return view('daftar_booking', compact('bookings'));
    }
}

