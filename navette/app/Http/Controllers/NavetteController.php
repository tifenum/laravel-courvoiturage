<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; // Ensure you include Auth
use Illuminate\Support\Facades\Log;
use App\Models\Navette;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;

class NavetteController extends Controller
{
    public function index()
    {
        $navettes = Navette::all();
        return view('job.testimonial', compact('navettes'));
    }
    
    public function indexReservations()
    {
        $navettes = Navette::all(); // Fetch all reservations (assuming Navette model holds reservation data)
        return view('job.job-list', compact('navettes')); // Adjust the view name as needed
    }
    public function store(Request $request)
    {
        try {
            // Log incoming request data for debugging purposes
            Log::info('Request data: ', $request->all());

            // Validate the request
            $validatedData = $request->validate([
                'destination' => 'required|string|max:255',
                'departure' => 'required|string|max:255',
                'arrival' => 'required|string|max:255',
                'vehicle_type' => 'required|string|max:255',
                'brand' => 'required|string|max:255',
                'price_per_person' => 'required|numeric|min:0',
                'vehicle_price' => 'required|numeric|min:0',
                'brand_price' => 'required|numeric|min:0',
            ]);
            $validatedData['creator'] = Auth::id(); // Get the authenticated user's ID

            // Create the navette record
            $navette = Navette::create($validatedData);

            // Calculate total price
            $totalPrice = $navette->price_per_person + $navette->vehicle_price + $navette->brand_price;

            // Return a successful response
            return redirect()->route('create_navette'); // Change 'creetenav' to the appropriate route name

        } catch (ValidationException $e) {
            // Log the validation errors
            Log::error('Validation failed: ', ['errors' => $e->errors()]);

            // Return a JSON response with validation errors
            return response()->json([
                'error' => 'Validation failed',
                'message' => $e->errors()
            ], 422);
        } catch (Exception $e) {
            // Log any other exceptions
            Log::error('Error occurred while storing navette data: ' . $e->getMessage());

            // Return a general error response
            return response()->json([
                'error' => 'An error occurred while processing your request.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            // Log incoming request data for debugging purposes
            Log::info('Update request data: ', $request->all());
    
            // Validate the request
            $validatedData = $request->validate([
                'destination' => 'required|string|max:255',
                'departure' => 'required|string|max:255',
                'arrival' => 'required|string|max:255',
                'vehicle_type' => 'required|string|max:255',
                'brand' => 'required|string|max:255',
                'price_per_person' => 'required|numeric|min:0',
                'vehicle_price' => 'required|numeric|min:0',
                'brand_price' => 'required|numeric|min:0',
            ]);
    
            // Find the navette by ID
            $navette = Navette::findOrFail($id);
    
            // Update the navette record
            $navette->update($validatedData);
    
            // Return a successful response
            return redirect()->route('navettes.index')->with('success', 'Navette updated successfully');
    
        } catch (ValidationException $e) {
            // Log the validation errors
            Log::error('Validation failed during update: ', ['errors' => $e->errors()]);
    
            // Return a JSON response with validation errors
            return response()->json([
                'error' => 'Validation failed',
                'message' => $e->errors()
            ], 422);
        } catch (Exception $e) {
            // Log any other exceptions
            Log::error('Error occurred while updating navette data: ' . $e->getMessage());
    
            // Return a general error response
            return response()->json([
                'error' => 'An error occurred while processing your request.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    

public function destroy($id)
{
    $navette = Navette::findOrFail($id);
    $navette->delete();

    return redirect()->route('navettes.index')->with('success', 'Navette deleted successfully');
}
}
