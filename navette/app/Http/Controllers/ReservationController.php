<?php

namespace App\Http\Controllers;

use App\Models\Reservation; 
use App\Models\Navette;// Ensure you import your Reservation model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class ReservationController extends Controller
{
    

public function store(Request $request)
{
    Log::info('Store method started', ['request_data' => $request->all()]);

    // Validate the incoming request
    $request->validate([
        'navette_id' => 'required|exists:navettes,id',
    ]);

    // Retrieve the navette
    $navette = Navette::find($request->navette_id);
    Log::info('Navette found', ['navette_id' => $request->navette_id]);

    $pricePerPerson = $navette->price_per_person;
    $vehiclePrice = $navette->vehicle_price;
    $brandPrice = $navette->brand_price;
    $special = $navette->special;

    Log::info('Prices and special offer retrieved', [
        'price_per_person' => $pricePerPerson,
        'vehicle_price' => $vehiclePrice,
        'brand_price' => $brandPrice,
        'special' => $special,
    ]);

    // Calculate the total price
    $totalPrice = $pricePerPerson * $vehiclePrice + $brandPrice - ($pricePerPerson * $vehiclePrice + $brandPrice) * $special / 100;

    Log::info('Total price calculated', ['total_price' => $totalPrice]);

    // Create the reservation
    $reservation = Reservation::create([
        'user_id' => Auth::id(),
        'navette_id' => $request->navette_id,
        'total_price' => $totalPrice,
    ]);

    Log::info('Reservation created', ['reservation_id' => $reservation->id]);

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
