<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Navette;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
 // Alias the Navette model

use Exception;

class UserProfileController extends Controller
{
    public function showNavettes()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch all navettes
        $navettes = Navette::all();

        // Pass the user and navettes data to the profile view
        return view('job.profile', compact('user', 'navettes'));
    }
}
