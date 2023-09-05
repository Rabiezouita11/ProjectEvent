<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Route::get('/stripe', function () {
    return view('Client.Stripe.index');
});
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

// rate event
Route::post('/submitRating', [App\Http\Controllers\DemandeurController::class, 'submitRating'])->name('submitRating')->middleware('auth');
// modifier profile
Route::post('/EditProfile', [App\Http\Controllers\DemandeurController::class, 'EditProfile'])->name('EditProfile');

// modifier password
Route::post('/update_password', [App\Http\Controllers\DemandeurController::class, 'update_password'])->name('update_password');

// show page events by category
Route::get('/ShowEventByCategory/{id}', [App\Http\Controllers\DemandeurController::class, 'ShowEventByCategory'])->name('ShowEventByCategory');

// show page events details
Route::get('/ShowEventDetails_{id}', [App\Http\Controllers\DemandeurController::class, 'ShowEventDetails'])->name('ShowEventDetails');

// button acheter ticket
Route::post('/buyTicket', [App\Http\Controllers\DemandeurController::class, 'buyTicket'])->name('buyTicket')->middleware('auth');

// button acheter ticket by stripe
Route::post('/buyTicketByStripe', [App\Http\Controllers\StripeController::class, 'session'])->name('session')->middleware('auth');
Route::get('/success',  [App\Http\Controllers\StripeController::class, 'success'])->name('success');


// show page Historique
Route::get('/historique', [App\Http\Controllers\DemandeurController::class, 'historique'])->name('historique')->middleware('auth');

// pdf facture
Route::get('/download-invoice/{reservation}', [App\Http\Controllers\DemandeurController::class, 'downloadInvoice'])->name('download-invoice');
// add event by demandeur 
Route::post('/addEventByDemandeur', [App\Http\Controllers\DemandeurController::class, 'addEventByDemandeur'])->name('addEventByDemandeur')->middleware('auth');



// show notification chaque client 
Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');


// mark notification as read
Route::post('/notifications/markAllAsRead',  [App\Http\Controllers\NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');







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
Route::post('/addEvent', [App\Http\Controllers\AdminController::class, 'addEvent'])->name('addEvent')->middleware('role:admin');

// button update Events
Route::post('/updateEvent', [App\Http\Controllers\AdminController::class, 'updateEvent'])->name('updateEvent');

// show page Contact list
Route::get('/contacts', [App\Http\Controllers\AdminController::class, 'contacts'])->name('contacts')->middleware('role:admin');

// show page Feedback list
Route::get('/feedbacks', [App\Http\Controllers\AdminController::class, 'feedbacks'])->name('feedbacks')->middleware('role:admin');

// show page utilisateurs list
Route::get('/Users', [App\Http\Controllers\AdminController::class, 'Users'])->name('Users')->middleware('role:admin');

// button delete utilisateurs
Route::post('/deleteUser', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('deleteUser');

// show page demandeurs list
Route::get('/eventsByDemandeur', [App\Http\Controllers\AdminController::class, 'eventsByDemandeur'])->name('eventsByDemandeur')->middleware('role:admin');

// button delete Events By Demandeur
Route::post('/deleteEventByDemandeur', [App\Http\Controllers\AdminController::class, 'refuse'])->name('deleteEventByDemandeur');

// button accepter Events By Demandeur
Route::post('/accepterEventByDemandeur', [App\Http\Controllers\AdminController::class, 'accept'])->name('accepterEventByDemandeur');



// button recieve  notification
Route::post('/message', [App\Http\Controllers\DemandeurController::class, 'message'])->name('message');











// // qrcode
// Route::get('/generate-qr', [App\Http\Controllers\QRCodeController::class, 'generateQR'])->name('generate-qr');
// Route::get('/download-qr/{filename}', [App\Http\Controllers\QRCodeController::class, 'downloadQR'])->name('download-qr');
