<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{

    // public function index()
    // {
    //     $bookings = Booking::all();
    //     return view('dashboard', compact('bookings'));
    // }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'restaurant' => 'required', 
            'booking_time' => 'required|date|unique:bookings',
            'guest_number' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        // Create a new booking instance
        $booking = new Booking;
        $booking->name = $validatedData['name'];
        $booking->restaurant = $validatedData['restaurant']; // Memasukkan data pilihan restaurant
        $booking->booking_time = $validatedData['booking_time'];
        $booking->guest_number = $validatedData['guest_number'];
        $booking->notes = $validatedData['notes'];
        $booking->save(); // Untuk menyimpan database

        // Redirect the user back with a success message
        return redirect()->back()->with('success', 'Booking created successfully!');
    }
}
