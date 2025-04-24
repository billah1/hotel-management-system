<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('home.index');
// });

Route::get('/',[AdminController::class,'home']);

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});

Route::get('/home',[AdminController::class,'index'])->name('home');

Route::get('/create_room',[AdminController::class,'createRoom']);
Route::post('/store',[AdminController::class,'storeRoom']);
Route::get('/view_room',[AdminController::class,'viewRoom']);
Route::get('/delete_room/{id}',[AdminController::class,'deleteRoom']);
Route::get('/edit_room/{id}',[AdminController::class,'editRoom']);
Route::post('/update_room/{id}',[AdminController::class,'updateRoom']);
