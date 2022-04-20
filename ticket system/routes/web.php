<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//admin routes

Route::prefix('admin')->group(function(){

    Route::get('/login',[AdminController::class, 'Index'])->name('login_form');
    Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');
    Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');

});



// ---------------------------------------------



Route::get('/', function () {
    auth()->logout();
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('user.home');
// })->middleware(['auth'])->name('dashboard');

Route::get('/home',[TicketController::class, 'home'])->middleware(['auth'])->name('user.home');


require __DIR__.'/auth.php';
  