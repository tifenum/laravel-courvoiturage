<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Navette;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;

class HomeController extends Controller{
    public function index()
    {
        $navettes = Navette::all();
        return view('job.index', compact('navettes'));
    }
}