<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('job.auth.auth');
});
// routes/api.php

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');

Route::put('/user/{id}', [AuthController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/user/{id}', [AuthController::class, 'delete'])->middleware('auth:sanctum');
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/reservation', [PageController::class, 'reservation'])->name('reservation');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/404', [PageController::class, 'error404'])->name('404');

// Agences routes
Route::get('/agences/create', [NavetteController::class, 'create'])->name('create_navette');
Route::get('/agences/manage', [NavetteController::class, 'manage'])->name('manage_navette');
