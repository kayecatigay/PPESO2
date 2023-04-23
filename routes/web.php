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
Auth::routes(['verify' => true]);

Route::get('profile', function () {
    // Only verified users may enter...

    })->middleware('verified');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/announcements', [App\Http\Controllers\HomeController::class, 'news']);
Route::get('/aboutus', [App\Http\Controllers\HomeController::class, 'about']);

Route::get('/userprofile', [App\Http\Controllers\uProfileController::class, 'phome']);

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
Route::get('/ofwinsertD',[App\Http\Controllers\ServicesController::class, 'ofwinsert']);

Route::get('/Announcements',[App\Http\Controllers\AnnouncementsController::class, 'GAnnounce']);
Route::get('/GeneralA',[App\Http\Controllers\AnnouncementsController::class, 'GeneralA']);
Route::get('/scholarA',[App\Http\Controllers\AnnouncementsController::class, 'scholarAnn']);
Route::get('/empA',[App\Http\Controllers\AnnouncementsController::class, 'empAnn']);
Route::get('/ofwA',[App\Http\Controllers\AnnouncementsController::class, 'ofwAnn']);

Route::get('/contactus', [App\Http\Controllers\ContactController::class, 'index']);

Route::get('/test', [App\Http\Controllers\ContactController::class, 'test123']);

// Route::get('/testside', [App\Http\Controllers\ServicesController::class, 'testsidebar']);

Route::middleware("admin")->group(function () {

    // 1==admin, 2=super admin , 3 =supersuper admin
    // All your admin routes go here.
    Route::get('/admindashboard', [App\Http\Controllers\AdminController::class, 'dashboard']);
    Route::get('/sidebar', [App\Http\Controllers\AdminController::class, 'side']);
    Route::get('/adminhomepage', [App\Http\Controllers\AdminController::class, 'ahome']);
    Route::get('/adminprofile', [App\Http\Controllers\AdminController::class, 'aphome']);
    
    Route::get('/peapD', [App\Http\Controllers\AdminController::class, 'peapD']);
    Route::get('/editPEAP', [App\Http\Controllers\AdminController::class, 'editPdata']);
    Route::post('/updateEpeap', [App\Http\Controllers\AdminController::class, 'updatePdata']);
    Route::post('/deletepeadD', [App\Http\Controllers\AdminController::class, 'deletePdata']);
    
    Route::get('/empD', [App\Http\Controllers\AdminController::class, 'empD']);
    
    Route::get('/ofwD', [App\Http\Controllers\AdminController::class, 'ofwD']);

});

