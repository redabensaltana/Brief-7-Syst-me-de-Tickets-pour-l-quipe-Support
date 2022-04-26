<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\TicketController;
use App\Models\Ticket;
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
    Route::get('/dashboard',[TicketController::class, 'adminDashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
    Route::get('/ticket_answers/{id}',[TicketController::class, 'adminTicket'])->middleware('admin')->name('admin.ticket_answers');
    Route::post('/add_answer_db',[AnswerController::class, 'adminAddAnswerDB'])->middleware('admin')->name('admin.add_answer_db');
    Route::get('/ticket_set_to_closed/{id}',[TicketController::class, 'setToClosed'])->middleware('admin')->name('admin.ticket_set_to_closed');

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
Route::get('/add_ticket',[TicketController::class, 'addTicket'])->middleware(['auth'])->name('user.add_ticket');
Route::post('/add_ticket_db',[TicketController::class, 'addTicketDB'])->middleware(['auth'])->name('user.add_ticket_db');
Route::get('/ticket_answers/{id}',[TicketController::class, 'ticket'])->middleware(['auth'])->name('user.ticket_answers');
Route::get('/ticket_set_to_solved/{id}',[TicketController::class, 'setToSolved'])->middleware(['auth'])->name('user.ticket_set_to_solved');
Route::post('/add_answer_db',[AnswerController::class, 'addAnswerDB'])->middleware(['auth'])->name('user.add_answer_db');

require __DIR__.'/auth.php';
  