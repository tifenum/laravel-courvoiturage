<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Home page method
    public function home()
    {
        return view('job.index');
    }

    // About page method
    public function about()
    {
        return view('job.about');
    }

    // Reservation page method
    public function reservation()
    {
        return view('job.job-list');
    }

    // Contact page method
    public function contact()
    {
        return view('job.contact');
    }

    // 404 page method
    public function error404()
    {
        return view('job.404');
    }
}
