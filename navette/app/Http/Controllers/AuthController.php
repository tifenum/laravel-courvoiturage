<?php

// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Register a new user
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'contactdetails' => 'required|string',
            'authorization' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'contactdetails' => $request->contactdetails,
            'authorization' => $request->authorization,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return view('job.auth.auth');
    }

    // Login a user
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('authToken')->plainTextToken;

        return view('job.index');
    }

    // Logout a user
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return view('job.auth.auth');
    }

    // Update user details
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->only('name', 'contactdetails', 'authorization'));

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
