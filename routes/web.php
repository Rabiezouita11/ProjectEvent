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




// show page profile client
Route::get('/profileclient', [App\Http\Controllers\DemandeurController::class, 'profile'])->name('profileclient')->middleware('auth');


// show page admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'home'])->name('admin')->middleware('role:admin');
 
// show page client
Route::get('/home', [App\Http\Controllers\DemandeurController::class, 'index'])->name('home');


// logout admin
Route::get('/logoutt', [App\Http\Controllers\AdminController::class, 'logout'])->name('logoutt');

// show page contact
Route::get('/contact', [App\Http\Controllers\DemandeurController::class, 'contact'])->name('contact')->middleware('auth');


// ajouter  contact
Route::post('/AjoutContact', [App\Http\Controllers\DemandeurController::class, 'AjoutContact'])->name('AjoutContact');

// authentification 
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




// modifier profile
Route::post('/EditProfile', [App\Http\Controllers\DemandeurController::class, 'EditProfile'])->name('EditProfile');

// modifier password
Route::post('/update_password', [App\Http\Controllers\DemandeurController::class, 'update_password'])->name('update_password');