
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NavetteController;
use App\Http\Controllers\UserProfileController ;
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

// Route for the login form (accessible without authentication)
// Route for showing the login form
Route::get('/', function () {
    return view('job.auth.auth');  // Assuming this is the login form view
})->name('login');

// Route for processing the login request
Route::post('/login', [AuthController::class, 'login'])->name('login');


// routes/api.php

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerAgence', [AuthController::class, 'registerAgence'])->name('registerAgence');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');

// Protected routes that require authentication
Route::group(['middleware' => 'auth'], function () {
    Route::put('/user/{id}', [AuthController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('/user/{id}', [AuthController::class, 'delete'])->middleware('auth:sanctum');
    Route::get('/home', [PageController::class, 'home'])->name('home');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/reservation', [NavetteController::class, 'indexReservations'])->name('navettes.reservations');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    Route::get('/404', [PageController::class, 'error404'])->name('404');
    Route::get('/profile' , [PageController::class , 'profile'])->name('profile');
    // Agences routes
    Route::get('/create', [PageController::class, 'category'])->name('create_navette');
    Route::post('/create/navette', [NavetteController::class, 'store'])->name('creetenav');
    Route::get('/navettes', [NavetteController::class, 'index'])->name('navettes.index');
    Route::get('/navettes/{id}/edit', [NavetteController::class, 'edit'])->name('edit_navette');
    Route::delete('/navettes/{id}', [NavetteController::class, 'destroy'])->name('delete_navette');

    //user Routes 
    Route::get('/profile', [UserProfileController::class, 'showProfile'])->name('profile');
    Route::get('/profile', [UserProfileController::class, 'showNavettes'])->name('profile');
});
