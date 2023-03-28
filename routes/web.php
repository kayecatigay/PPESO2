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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/announcements', [App\Http\Controllers\HomeController::class, 'news']);

Route::get('/services', [App\Http\Controllers\ServicesController::class, 'index']);
Route::get('/scholarhomepage', [App\Http\Controllers\ServicesController::class, 'shome']);
Route::get('/Sregistration',[App\Http\Controllers\ServicesController::class, 'registrationform']);
Route::get('/scholardata',[App\Http\Controllers\ServicesController::class, 'insertdata']);
Route::get('/oldscholardetails',[App\Http\Controllers\ServicesController::class, 'viewolddata']);
Route::get('/oldscholarupdate',[App\Http\Controllers\ServicesController::class, 'updatedata']);

Route::get('/employmenthomepage',[App\Http\Controllers\ServicesController::class, 'emphome']);
Route::get('/Eregistration',[App\Http\Controllers\ServicesController::class, 'Eregistrationform']);
Route::get('/empdata',[App\Http\Controllers\ServicesController::class, 'insertEMPdata']);

Route::get('/ofwhomepage',[App\Http\Controllers\ServicesController::class, 'ofwhome']);
Route::get('/ofwregistration',[App\Http\Controllers\ServicesController::class, 'ofwform']);

Route::get('/contactus', [App\Http\Controllers\ContactController::class, 'index']);

Route::get('/admindashoard', [App\Http\Controllers\AdminController::class, 'dashboard']);
