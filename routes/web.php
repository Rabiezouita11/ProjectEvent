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



                                                                              /* Client */ 
// show page profile client
Route::get('/profileclient', [App\Http\Controllers\DemandeurController::class, 'profile'])->name('profileclient')->middleware('auth');



 
// show page client
Route::get('/home', [App\Http\Controllers\DemandeurController::class, 'index'])->name('home');

// show page About
Route::get('/about', [App\Http\Controllers\DemandeurController::class, 'about'])->name('about');



// show page contact
Route::get('/contact', [App\Http\Controllers\DemandeurController::class, 'contact'])->name('contact')->middleware('auth');


// ajouter  contact
Route::post('/AjoutContact', [App\Http\Controllers\DemandeurController::class, 'AjoutContact'])->name('AjoutContact');

// authentification 
Auth::routes();


// modifier profile
Route::post('/EditProfile', [App\Http\Controllers\DemandeurController::class, 'EditProfile'])->name('EditProfile');

// modifier password
Route::post('/update_password', [App\Http\Controllers\DemandeurController::class, 'update_password'])->name('update_password');





                                                                            /* Admin */ 

                                                                            // show page admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'home'])->name('admin')->middleware('role:admin');

// logout admin
Route::get('/logoutt', [App\Http\Controllers\AdminController::class, 'logout'])->name('logoutt');

// show page categories list
Route::get('/categories', [App\Http\Controllers\AdminController::class, 'categories'])->name('categories')->middleware('role:admin');

// button ajouter Categories
Route::post('/AddCategory', [App\Http\Controllers\AdminController::class, 'AddCategory'])->name('AddCategory');

// button supprimer Categories
Route::post('/deleteCategory', [App\Http\Controllers\AdminController::class, 'deleteCategory'])->name('deleteCategory');

// show page ajouter Categories
Route::get('/pageCategoryAjouter', [App\Http\Controllers\AdminController::class, 'showPageAddCategory'])->name('pageCategoryAjouter')->middleware('role:admin');

// show page modifier Categories
Route::post('/updateCategory', [App\Http\Controllers\AdminController::class, 'updateCategory'])->name('updateCategory')->middleware('role:admin');

// show page events list
Route::get('/events', [App\Http\Controllers\AdminController::class, 'events'])->name('events')->middleware('role:admin');

// button delete events 
Route::post('/deleteEvent', [App\Http\Controllers\AdminController::class, 'deleteEvent'])->name('deleteEvent');

//  show Page Add Events
Route::get('/pageAddEvent', [App\Http\Controllers\AdminController::class, 'showPageAddEvents'])->name('showPageAddEvents')->middleware('role:admin');

// button Add Events
Route::post('/addEvent', [App\Http\Controllers\AdminController::class, 'addEvent'])->name('addEvent');

// button update Events
Route::post('/updateEvent', [App\Http\Controllers\AdminController::class, 'updateEvent'])->name('updateEvent');