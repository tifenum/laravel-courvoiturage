<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NavetteController;

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
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/reservation', [NavetteController::class, 'indexReservations'])->name('navettes.reservations'); // New route for reservations
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/404', [PageController::class, 'error404'])->name('404');

// Agences routes
Route::get('/create', [PageController::class, 'category'])->name('create_navette');
Route::get('/manage', [NavetteController::class, 'index'])->name('navettes.index');

Route::post('/create/navette', [NavetteController::class, 'store'])->name('creetenav');

Route::get('/navettes', [NavetteController::class, 'index'])->name('navettes.index');

// Edit route
Route::get('/navettes/{id}/edit', [NavetteController::class, 'edit'])->name('edit_navette');

// Delete route
Route::delete('/navettes/{id}', [NavetteController::class, 'destroy'])->name('delete_navette');

Route::get('/navettes/reservations', [NavetteController::class, 'indexReservations'])->name('navettes.reservations'); // New route for reservations


