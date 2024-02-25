<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('dashboard',compact('bookings'));
    }
    
}
