<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class DaftarBookingController extends Controller
{
    public function show()
    {
        $bookings = Booking::whereDate('booking_time', Carbon::today())->get();
        return view('daftar_booking', compact('bookings'));
    }

    public function filterByDate(Request $request)
    {
        $selectedDate = $request->input('booking_date');
        $bookings = Booking::whereDate('booking_time', $selectedDate)->get();
        return view('daftar_booking', compact('bookings'));
    }
}
