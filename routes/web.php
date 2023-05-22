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

    // 0=user 1=scholar admin, 2=emp admin 3=ofw admin 4 =super admin
    // All your admin routes go here.
    Route::get('/admindashboard', [App\Http\Controllers\AdminController::class, 'dashboard']);
    Route::get('/sidebar', [App\Http\Controllers\AdminController::class, 'side']);
    Route::get('/adminhomepage', [App\Http\Controllers\AdminController::class, 'ahome']);
    Route::get('/adminprofile', [App\Http\Controllers\AdminController::class, 'aphome']);
    
    Route::get('/ofwD', [App\Http\Controllers\AdminController::class, 'ofwD']);
    Route::get('/editOFW', [App\Http\Controllers\AdminController::class, 'editOdata']);
    Route::get('/updateofwD', [App\Http\Controllers\AdminController::class, 'updateOdata']);
    Route::get('/deleteofwD', [App\Http\Controllers\AdminController::class, 'deleteOdata']);

    Route::get('/usersD', [App\Http\Controllers\AdminController::class, 'usersD']);
    Route::get('/editUser', [App\Http\Controllers\AdminController::class, 'editUdata']);
    Route::get('/updateEuser', [App\Http\Controllers\AdminController::class, 'updateUdata']);
    Route::get('/deleteuserD', [App\Http\Controllers\AdminController::class, 'deleteUdata']);

    Route::get('/Sadmindashboard', [App\Http\Controllers\ScholarAdminController::class, 'SAdashboard']);
    Route::get('/showAllSApp', [App\Http\Controllers\ScholarAdminController::class, 'scholarNOData']);
    Route::get('/newScholar', [App\Http\Controllers\ScholarAdminController::class, 'newSD']);
    Route::get('/oldScholar', [App\Http\Controllers\ScholarAdminController::class, 'oldSD']);
    Route::get('/editPEAP', [App\Http\Controllers\ScholarAdminController::class, 'editPdata']);
    Route::post('/updateEpeap', [App\Http\Controllers\ScholarAdminController::class, 'updatePdata']);
    Route::post('/deletepeadD', [App\Http\Controllers\ScholarAdminController::class, 'deletePdata']);
    Route::get('/SAllSched', [App\Http\Controllers\ScholarAdminController::class, 'allSched']);
    Route::get('/SchedExam', [App\Http\Controllers\ScholarAdminController::class, 'Ssexam']);
    Route::get('/addSched', [App\Http\Controllers\ScholarAdminController::class, 'addS']);
    Route::get('/insertSched', [App\Http\Controllers\ScholarAdminController::class, 'insertS']);
    Route::get('/editSched', [App\Http\Controllers\ScholarAdminController::class, 'editSched']);
    Route::get('/updateSched', [App\Http\Controllers\ScholarAdminController::class, 'updateS']);
    Route::get('/deleteSched', [App\Http\Controllers\ScholarAdminController::class, 'deleteSched']);
    Route::get('/Sannouncements', [App\Http\Controllers\ScholarAdminController::class, 'sAnn']);
    Route::get('/addAnnouncements', [App\Http\Controllers\ScholarAdminController::class, 'addAnn']);
    Route::get('/editAnnouncements', [App\Http\Controllers\ScholarAdminController::class, 'editAnn']);
    Route::get('/insertAnn', [App\Http\Controllers\ScholarAdminController::class, 'insertA']);
    Route::get('/updateAnn', [App\Http\Controllers\ScholarAdminController::class, 'updateA']);
    Route::get('/deleteAnn', [App\Http\Controllers\ScholarAdminController::class, 'deleteAnn']);
    Route::get('/Stracking', [App\Http\Controllers\ScholarAdminController::class, 'Stracking']);

    Route::get('/Eadmindashboard', [App\Http\Controllers\EmpAdminController::class, 'EAdashboard']);
    Route::get('/showAllEApp', [App\Http\Controllers\EmpAdminController::class, 'showEmpData']);
    Route::get('/editEMP', [App\Http\Controllers\EmpAdminController::class, 'editEdata']);
    Route::post('/updateEemp', [App\Http\Controllers\EmpAdminController::class, 'updateEdata']);
    Route::post('/deleteEMPD', [App\Http\Controllers\EmpAdminController::class, 'deleteEdata']);
    Route::get('/AllWorks', [App\Http\Controllers\EmpAdminController::class, 'Allworks']);
    Route::get('/AddWorks', [App\Http\Controllers\EmpAdminController::class, 'addworks']);
    Route::get('/insertWork', [App\Http\Controllers\EmpAdminController::class, 'insertWorks']);
    Route::get('/editWorks', [App\Http\Controllers\EmpAdminController::class, 'editW']);
    Route::get('/updateWorks', [App\Http\Controllers\EmpAdminController::class, 'updateW']);
    Route::get('/deleteWork', [App\Http\Controllers\EmpAdminController::class, 'deleteW']);
    Route::get('/empSched', [App\Http\Controllers\EmpAdminController::class, 'allESched']);
    Route::get('/addeSched', [App\Http\Controllers\EmpAdminController::class, 'addeSched']);
    Route::get('/inserteSched', [App\Http\Controllers\EmpAdminController::class, 'insertEs']);
    Route::get('/editeSched', [App\Http\Controllers\EmpAdminController::class, 'editeSched']);
    Route::get('/deleteESched', [App\Http\Controllers\EmpAdminController::class, 'deleteESched']);
    
    
    

    
    

    Route::get('/Oadmindashboard', [App\Http\Controllers\OfwAdminController::class, 'OAdashboard']);
});

