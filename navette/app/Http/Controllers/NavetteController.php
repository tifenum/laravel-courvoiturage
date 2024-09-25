<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavetteController extends Controller
{
    public function create() {
        return view('navettes.create');
    }

    public function manage() {
        return view('navettes.manage');
    }
}
