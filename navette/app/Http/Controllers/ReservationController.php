<?php

namespace App\Http\Controllers;

use App\Models\Reservation; // Ensure you import your Reservation model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'navette_id' => 'required|exists:navettes,id', // Assuming you have a navettes table
        ]);

        // Create a new reservation
        $reservation = Reservation::create([
            'user_id' => Auth::id(), // Get the currently authenticated user's ID
            'navette_id' => $request->navette_id,
        ]);

        // Return a response
        return response()->json([
            'message' => 'Reservation created successfully.',
            'reservation' => $reservation,
        ], 201);
    }

    public function updateStatus($id, $status)
    {
        // Find the reservation by ID
        $reservation = Reservation::findOrFail($id);

        // Validate the status to accept only 'accepted' or 'refused'
        if (!in_array($status, ['accepted', 'refused'])) {
            return response()->json(['message' => 'Invalid status'], 400);
        }

        // Update the reservation status based on the status passed
        $reservation->status = ($status === 'accepted'); // true for accepted, false for refused
        $reservation->save();

        // Return a response
        return redirect()->back()->withInput();
    }

}
