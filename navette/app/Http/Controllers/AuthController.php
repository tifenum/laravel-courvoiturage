<?php

// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // Register a new user
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'contactdetails' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'contactdetails' => $request->contactdetails,
            'email' => $request->email,
            'role' => 'USER',
            'password' => Hash::make($request->password),
        ]);

        return view('job.auth.auth');
    }
    public function registerAgence(Request $request)
    {
        // Validate the input data
        Log::info('Register Agence Request Data:', $request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);
    
        // Handle validation failure
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        // Create a new user with the role of AGENCE and store the 'lieu' field
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'place' => $request->lieu, // Using 'lieu' as the contact detail
            'role' => 'AGENCE', // Set the role as 'AGENCE'
            'password' => Hash::make($request->password),
        ]);

        // Redirect to the appropriate view (or handle registration logic)
        return view('job.auth.auth');
    }
    
    // Login a user
    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (!Auth::attempt($credentials)) {
    //         return response()->json(['message' => 'Unauthorized'], 401);
    //     }

    //     $user = Auth::user();
    //     $token = $user->createToken('authToken')->plainTextToken;

    //     return view('job.index');
    // }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    $email    = $request->email;
    $password = $request->password;


    // Attempt to authenticate the user
    $user = User::where('email', $email)->first();

    if ($user && Auth::attempt(['email' => $email, 'password' => $password])) {
        // Log the successful login
        return redirect()->intended('home');
    } else {
        // Authentication failed
        return redirect('/');
}
}
    // Logout a user
    public function logout1(Request $request)
    {
        $request->user()->tokens()->delete();
        return view('job.auth.auth');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');  // Make sure this redirects to the GET login route
    }
    

    // Update user details
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->only('name', 'contactdetails'));

        return response()->json(['message' => 'User updated successfully', 'user' => $user], 200);
    }

    // Delete a user (soft delete)
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
