<?php

use App\Mail\TestMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Mail;

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
Route::get('/AddProfile', [App\Http\Controllers\uProfileController::class, 'addP']);
Route::get('/insertProfile', [App\Http\Controllers\uProfileController::class, 'insertP']);

Route::get('/deleteR', [App\Http\Controllers\uProfileController::class, 'delResume']);

Route::get('/getbarangay/{id}', [App\Http\Controllers\uProfileController::class, 'selectB']);

Route::get('/addWorkE', [App\Http\Controllers\uProfileController::class, 'addW']);
Route::get('/insertWorke', [App\Http\Controllers\uProfileController::class, 'insertWorke']);
Route::get('/deleteWorke', [App\Http\Controllers\uProfileController::class, 'deleteWorke']);

Route::get('/insertSchT', [App\Http\Controllers\uProfileController::class, 'insertSchT']);
Route::get('/cancelsTable', [App\Http\Controllers\uProfileController::class, 'cancelS']);
Route::get('/canceleTable', [App\Http\Controllers\uProfileController::class, 'cancelE']);

Route::get('/addofwT', [App\Http\Controllers\uProfileController::class, 'addO']);
Route::get('/insertOf', [App\Http\Controllers\uProfileController::class, 'insertOf']);
Route::get('/cancelOfwT', [App\Http\Controllers\uProfileController::class, 'cancelO']);

Route::get('/services', [App\Http\Controllers\ServicesController::class, 'index']);
Route::get('/scholarhomepage', [App\Http\Controllers\ServicesController::class, 'shome']);
Route::get('/Sregistration',[App\Http\Controllers\ServicesController::class, 'registrationform']);
Route::get('/scholardata',[App\Http\Controllers\ServicesController::class, 'insertdata']);
Route::get('/oldscholardetails',[App\Http\Controllers\ServicesController::class, 'viewolddata']);
Route::get('/oldscholarupdate',[App\Http\Controllers\ServicesController::class, 'updatedata']);

Route::get('/employmenthomepage',[App\Http\Controllers\ServicesController::class, 'emphome']);
Route::get('/Eregistration',[App\Http\Controllers\ServicesController::class, 'Eregistrationform']);
Route::get('/addEmpTable', [App\Http\Controllers\ServicesController::class, 'addE']);
Route::get('/insertEmpF', [App\Http\Controllers\ServicesController::class, 'insertEmpF']);
Route::get('/empdata',[App\Http\Controllers\ServicesController::class, 'insertEMPdata']);

Route::get('/ofwhomepage',[App\Http\Controllers\ServicesController::class, 'ofwhome']);
Route::get('/ofwregistration',[App\Http\Controllers\ServicesController::class, 'ofwform']);
Route::get('/ofwinsertD',[App\Http\Controllers\ServicesController::class, 'ofwinsert']);

Route::get('/Announcements',[App\Http\Controllers\AnnouncementsController::class, 'GAnnounce']);
Route::get('/GeneralA/{srv}',[App\Http\Controllers\AnnouncementsController::class, 'GeneralA']);
Route::get('/info/{id}',[App\Http\Controllers\AnnouncementsController::class, 'genInfo']);

// Route::get('/uploadfile', [App\Http\Controllers\FileUploadController::class, 'index']);
// Route::get('/uploadfile', [App\Http\Controllers\FileUploadController::class, 'showUploadFile']);

Route::get('/upload', [App\Http\Controllers\FileUploadController::class, 'showUploadForm']);
Route::post('/uploadfile', [App\Http\Controllers\FileUploadController::class, 'uploadFile']);



Route::get('/contactus', [App\Http\Controllers\ContactController::class, 'index']);

Route::get('/test', [App\Http\Controllers\ContactController::class, 'test123']);

Route::get('/notif', [App\Http\Controllers\NotificationController::class, 'notification']);
Route::get('/sendnotif', [App\Http\Controllers\NotificationController::class, 'sendNotification']);
// Route::get('/testside', [App\Http\Controllers\ServicesController::class, 'testsidebar']);

Route::get('/send-email',[MailController::class,'sendEmail']);

Route::middleware("admin")->group(function () {

    // 0=user 1=scholar admin, 2=emp admin 3=ofw admin 4 =super admin
    // All your admin routes go here.
    
    Route::get('/admindashboard', [App\Http\Controllers\AdminController::class, 'dashboard']);
    Route::get('/sidebar', [App\Http\Controllers\AdminController::class, 'side']);
    Route::get('/adminhomepage', [App\Http\Controllers\AdminController::class, 'ahome']);
    Route::get('/adminprofile', [App\Http\Controllers\AdminController::class, 'aphome']);

    Route::get('/usersD', [App\Http\Controllers\AdminController::class, 'usersD']);
    Route::get('/editUser', [App\Http\Controllers\AdminController::class, 'editUdata']);
    Route::get('/updateEuser', [App\Http\Controllers\AdminController::class, 'updateUdata']);
    Route::get('/deleteuserD', [App\Http\Controllers\AdminController::class, 'deleteUdata']);

    Route::get('/Sadmindashboard', [App\Http\Controllers\ScholarAdminController::class, 'SAdashboard']);
    Route::get('/showAllSApp', [App\Http\Controllers\ScholarAdminController::class, 'scholarNOData']);
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
    Route::get('/updateESched', [App\Http\Controllers\EmpAdminController::class, 'updateEs']);
    Route::get('/deleteESched', [App\Http\Controllers\EmpAdminController::class, 'deleteESched']); 
    Route::get('/Eannouncements', [App\Http\Controllers\EmpAdminController::class, 'eAnn']);
    Route::get('/addeAnnouncements', [App\Http\Controllers\EmpAdminController::class, 'addEann']);
    Route::get('/inserteAnn', [App\Http\Controllers\EmpAdminController::class, 'insertEann']);
    Route::get('/editEAnnouncements', [App\Http\Controllers\EmpAdminController::class, 'EditeAnn']);
    Route::get('/updateEann', [App\Http\Controllers\EmpAdminController::class, 'updateEann']);
    Route::get('/deleteEAnn', [App\Http\Controllers\EmpAdminController::class, 'deleteEann']);
    Route::get('/EmployerW', [App\Http\Controllers\EmpAdminController::class, 'employers']);
    Route::get('/deleteEmployer', [App\Http\Controllers\EmpAdminController::class, 'delEmp']);
    // Route::get('/view-file/{filename}',[App\Http\Controllers\FileUploadController::class, 'viewFile']);
    // Route::get('/view-file/{filename}', 'YourController@viewFile')->name('view.file');

    
    Route::get('/Oadmindashboard', [App\Http\Controllers\OfwAdminController::class, 'OAdashboard']);
    Route::get('/showAllOApp', [App\Http\Controllers\OfwAdminController::class, 'showOFWdata']);
    Route::get('/editOFW', [App\Http\Controllers\OfwAdminController::class, 'editOdata']);
    Route::get('/updateofwD', [App\Http\Controllers\OfwAdminController::class, 'updateOdata']);
    Route::get('/deleteofwD', [App\Http\Controllers\OfwAdminController::class, 'deleteOdata']);
    Route::get('/ofwSched', [App\Http\Controllers\OfwAdminController::class, 'ofwSched']);
    Route::get('/addOsched', [App\Http\Controllers\OfwAdminController::class, 'addOsched']);
    Route::get('/insertoSched', [App\Http\Controllers\OfwAdminController::class, 'insertoSched']);
    Route::get('/editOsched', [App\Http\Controllers\OfwAdminController::class, 'editOsched']);
    Route::get('/updateOSched', [App\Http\Controllers\OfwAdminController::class, 'updateOSched']);
    Route::get('/deleteOsched', [App\Http\Controllers\OfwAdminController::class, 'deleteOsched']);
    Route::get('/Oannouncements', [App\Http\Controllers\OfwAdminController::class, 'oAnn']);
    Route::get('/addoAnnouncements', [App\Http\Controllers\OfwAdminController::class, 'addOann']);
    Route::get('/insertoAnn', [App\Http\Controllers\OfwAdminController::class, 'insertoAnn']);
    Route::get('/editOAnnouncements', [App\Http\Controllers\OfwAdminController::class, 'EditOAnn']);
    Route::get('/updateOann', [App\Http\Controllers\OfwAdminController::class, 'updateOann']);
    Route::get('/deleteOAnn', [App\Http\Controllers\OfwAdminController::class, 'deleteOAnn']);
    
    Route::get('/SendSms', [App\Http\Controllers\ContactController::class, 'sendsms']);
    Route::get('/send', [App\Http\Controllers\ContactController::class, 'sendmess']);
    
    Route::get('/Pstatus', [App\Http\Controllers\ScholarAdminController::class, 'pstatus']);
    Route::get('/Papprove', [App\Http\Controllers\ScholarAdminController::class, 'approve']);
    
    Route::get('/Estatus', [App\Http\Controllers\EmpAdminController::class, 'estatus']);
    Route::get('/Eapprove', [App\Http\Controllers\EmpAdminController::class, 'eapprove']);
    
    Route::get('/Ostatus', [App\Http\Controllers\OfwAdminController::class, 'ostatus']);
    Route::get('/Oapprove', [App\Http\Controllers\OfwAdminController::class, 'oapprove']);
    
    Route::get('/ScholarPrint', [App\Http\Controllers\ScholarAdminController::class, 'scholarP']);
    Route::get('/StrackingPrint', [App\Http\Controllers\ScholarAdminController::class, 'trackingP']);
    Route::get('/SannPrint', [App\Http\Controllers\ScholarAdminController::class, 'sannP']);
    Route::get('/statPrint', [App\Http\Controllers\ScholarAdminController::class, 'statP']);
    
    Route::get('/ePrint', [App\Http\Controllers\EmpAdminController::class, 'ePrint']);
    Route::get('/WorkPrint', [App\Http\Controllers\EmpAdminController::class, 'workP']);
    Route::get('/EstatPrint', [App\Http\Controllers\EmpAdminController::class, 'estatP']);
    Route::get('/resPrint', [App\Http\Controllers\EmpAdminController::class, 'resShow']);
    

    
    
    Route::get('/OPrint', [App\Http\Controllers\OfwAdminController::class, 'ofwP']);
    Route::get('/OstatusPrint', [App\Http\Controllers\OfwAdminController::class, 'ostatP']);
    
    Route::get('/printDashboard', [App\Http\Controllers\AdminController::class, 'dashboardP']);
    
    Route::get('/files/{id}', [App\Http\Controllers\FileUploadController::class, 'showFile']);

   
});

