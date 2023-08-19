<?php

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


//  pour test 
// Route::get('/admin', function () {
//     return view('Admin.home.home');
// });
// Route::get('/akrem', function () {
//     return view('Client.home.home');
// });


// show page admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'home'])->name('admin')->middleware('role:admin');
 
// show page client
Route::get('/home', [App\Http\Controllers\DemandeurController::class, 'index'])->name('home');

Route::get('/logoutt', [App\Http\Controllers\AdminController::class, 'logout'])->name('logoutt');



// authentification 
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
