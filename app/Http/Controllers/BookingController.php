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
            'name' => 'required|unique:users',
            'email' => 'nullable|email',
            'restaurant' => 'required', // Make sure the restaurant field is required
            'booking_time' => 'required|date|unique:bookings',
            'guest_number' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        // Create a new booking instance
        $booking = new Booking;
        $booking->name = $validatedData['name'];
        $booking->restaurant = $validatedData['restaurant']; // Store the selected restaurant
        $booking->booking_time = $validatedData['booking_time'];
        $booking->guest_number = $validatedData['guest_number'];
        $booking->notes = $validatedData['notes'];
        $booking->save(); // Save the booking to the database

        // Redirect the user back with a success message
        return redirect()->back()->with('success', 'Booking created successfully!');
    }
}
