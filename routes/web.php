<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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
Route::get('/details_room/{id}',[HomeController::class,'detailsRoom']);
Route::post('/add_booking/{id}',[HomeController::class,'addBooking']);
Route::post('/contact',[HomeController::class,'contact']);
Route::get('/our_rooms',[HomeController::class,'ourRooms']);
Route::get('/hotel_gallery',[HomeController::class,'hotelGallery']);
Route::get('/contact_us',[HomeController::class,'contactUs']);


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

Route::get('/create_room',[AdminController::class,'createRoom'])->middleware(['auth','admin']);
Route::post('/store',[AdminController::class,'storeRoom'])->middleware(['auth','admin']);
Route::get('/view_room',[AdminController::class,'viewRoom'])->middleware(['auth','admin']);
Route::get('/delete_room/{id}',[AdminController::class,'deleteRoom'])->middleware(['auth','admin']);
Route::get('/edit_room/{id}',[AdminController::class,'editRoom'])->middleware(['auth','admin']);
Route::post('/update_room/{id}',[AdminController::class,'updateRoom'])->middleware(['auth','admin']);

//booking status 

Route::get('/bookings',[AdminController::class,'bookings'])->middleware(['auth','admin']);
Route::get('/delete_booking/{id}',[AdminController::class,'deleteBookings'])->middleware(['auth','admin']);
Route::get('/approve_booking/{id}',[AdminController::class,'approveBookings'])->middleware(['auth','admin']);
Route::get('/reject_booking/{id}',[AdminController::class,'rejectBookings'])->middleware(['auth','admin']);


//gallary

Route::get('/view_gallary',[AdminController::class,'viewGallary'])->middleware(['auth','admin']);
Route::post('/upload_gallary',[AdminController::class,'uploadGallary'])->middleware(['auth','admin']);
Route::get('/delete_gallary/{id}',[AdminController::class,'deleteGallary'])->middleware(['auth','admin']);


//conatct 

Route::get('/all_messages',[AdminController::class,'allMessages'])->middleware(['auth','admin']);
Route::get('/send_mail/{id}',[AdminController::class,'sendMail'])->middleware(['auth','admin']);
Route::post('/mail/{id}',[AdminController::class,'mail'])->middleware(['auth','admin']);


