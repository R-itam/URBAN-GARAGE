<?php

use App\Http\Controllers\Urabancontroller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',[Urabancontroller::class,'home_view']);
Route::get('/userhome',[Urabancontroller::class,'userhome_view']);
Route::get('/adminhome',[Urabancontroller::class,'adminhome_view']);
Route::get('/adminpanel',[Urabancontroller::class,'adminpanel_view']);
Route::get('/about',[Urabancontroller::class,'about_view']);
Route::get('/servies',[Urabancontroller::class,'servies_view']);
Route::get('/contact',[Urabancontroller::class,'contact_view']);
Route::get('/registrationform',[Urabancontroller::class,'registration_view']);
Route::post('/formaction',[Urabancontroller::class,'registration_submit']);
Route::get('/loginform',[Urabancontroller::class,'login_view']);
Route::post('/loginaction',[Urabancontroller::class,'login_submit']);
Route::get('/logout',[Urabancontroller::class,'logout']);
Route::get('/sedansection',[Urabancontroller::class,'sedan_section']);
Route::get('/suvsection',[Urabancontroller::class,'suv_section']);
Route::get('/luxurysection',[Urabancontroller::class,'luxurysection']);
Route::get('/userdetails',[Urabancontroller::class,'user_details']);
Route::get('/adminabout',[Urabancontroller::class,'adminabout_view']);
Route::get('/adminservies',[Urabancontroller::class,'adminservies_view']);
Route::get('/admincontact',[Urabancontroller::class,'admincontact_view']);
Route::get('/sedanadd',[Urabancontroller::class,'sedanadd_view']);
Route::post('/sedanaddaction',[Urabancontroller::class,'sedanadd_submit']);
Route::get('/sedanview',[Urabancontroller::class,'sedan_view']);
Route::get('/sedaneditview',[Urabancontroller::class,'sedaned_view']);
Route::get('/sedandelete{sedan_del}',[Urabancontroller::class,'sedan_delete']);
Route::get('/sedaneditform{sedan_ed}',[Urabancontroller::class,'sedanedit_form']);
Route::post('/sedaneditformaction',[Urabancontroller::class,'sedanedit_submit']);
Route::get('/luxuryadd',[Urabancontroller::class,'luxuryadd_view']);
Route::post('/luxuryaddaction',[Urabancontroller::class,'luxuryadd_submit']);
Route::get('/luxuryview',[Urabancontroller::class,'luxury_view']);
Route::get('/luxuryeditview',[Urabancontroller::class,'luxuryed_view']);
Route::get('/luxurydelete{luxury_del}',[Urabancontroller::class,'luxury_delete']);
Route::get('/luxuryeditform{luxury_ed}',[Urabancontroller::class,'luxuryedit_form']);
Route::post('/luxuryeditformaction',[Urabancontroller::class,'luxuryedit_submit']);
Route::get('/suvadd',[Urabancontroller::class,'suvadd_view']);
Route::post('/suvaddaction',[Urabancontroller::class,'suvadd_submit']);
Route::get('/suvview',[Urabancontroller::class,'suv_view']);
Route::get('/suveditview',[Urabancontroller::class,'suvedit_view']);
Route::get('/suvdelete{suv_del}',[Urabancontroller::class,'suv_delete']);
Route::get('/suveditform{suv_ed}',[Urabancontroller::class,'suvedit_form']);
Route::post('/suveditformaction',[Urabancontroller::class,'suvedit_submit']);
Route::get('/block{bl}',[Urabancontroller::class,'user_block']);
Route::get('/unblock{unblk}',[Urabancontroller::class,'user_unblock']);
Route::get('/userinfo',[Urabancontroller::class,'userinfo_view']);
Route::get('/changepassword',[Urabancontroller::class,'changepass_view']);
Route::post('/changepasswordaction',[Urabancontroller::class,'changepass_submit']);
Route::get('/userinfoedit',[Urabancontroller::class,'userinfoedit_view']);
Route::post('/userinfoeditaction',[Urabancontroller::class,'userinfoedit_submit']);
Route::post('/feedbackaction',[Urabancontroller::class,'feedback_submit']);
Route::get('/feedbackview',[Urabancontroller::class,'feedback_view']);
Route::get('/feedbackdelete{feeddel}',[Urabancontroller::class,'feedback_delete']);
Route::get('/bookingView{Car_id}',[Urabancontroller::class,'booking_View']);
Route::get('/termscondition',[Urabancontroller::class,'termscondition_view']);
Route::post('/bookingaction',[Urabancontroller::class,'booking_submit']);
Route::get('/bookingdetail',[Urabancontroller::class,'bookdetails_view']);
Route::get('/adminbookdetail',[Urabancontroller::class,'adminbook_view']);
Route::get('/canceltrip{cancel}',[Urabancontroller::class,'cancel_trip']);
Route::get('/confirmtrip{confirm}',[Urabancontroller::class,'confirm_trip']);
Route::get('/ucanceltrip{ucancel}',[Urabancontroller::class,'usertrip_cancel']);
Route::get('/driversection',[Urabancontroller::class,'driversection_view']);
Route::get('/drivereditview',[Urabancontroller::class,'driveredit_view']);
Route::get('/driverdelete{d_del}',[Urabancontroller::class,'driver_delete']);
Route::get('/driverview',[Urabancontroller::class,'driver_view']);
Route::get('/bookdriverView{email}',[Urabancontroller::class,'bookdriver_view']);
Route::post('/bookingdriveraction',[Urabancontroller::class,'driverbook_submit']);
Route::get('/admindriverbook',[Urabancontroller::class,'admindriverbook_details']);
Route::get('/canceldriver{cdri}',[Urabancontroller::class,'cancel_driver']);
Route::get('/confirmdriver{condr}',[Urabancontroller::class,'confirm_driver']);
Route::get('/ucanceldrive{ucandr}',[Urabancontroller::class,'ucancel_drive']);
Route::get('/showpage',[Urabancontroller::class,'showpage_view']);
Route::get('/driverloginform',[Urabancontroller::class,'driverlogin_view']);
Route::post('/driverloginaction',[Urabancontroller::class,'driverlogin_submit']);
Route::get('/driverregistrationform',[Urabancontroller::class,'driverregistration_view']);
Route::post('/driverformaction',[Urabancontroller::class,'driverregistration_submit']);
Route::get('/driverhome',[Urabancontroller::class,'driverhome_view']);
Route::get('/driverinfo',[Urabancontroller::class,'driverinfo_view']);
Route::get('/driverchangepassword',[Urabancontroller::class,'driverchangepass_view']);
Route::post('/drchangepasswordaction',[Urabancontroller::class,'drchangepass_submit']);
Route::get('/driverinfoedit',[Urabancontroller::class,'driverinfoedit_view']);
Route::post('/driverinfoeditaction',[Urabancontroller::class,'driverinfoedit_submit']);
Route::get('/driverlist',[Urabancontroller::class,'driverlist_view']);
Route::get('/drblock{drbl}',[Urabancontroller::class,'drblock_action']);
Route::get('/drunblock{drunbl}',[Urabancontroller::class,'drunblock_action']);
Route::get('/driverbookingdetail',[Urabancontroller::class,'driverbookingdetail_view']);
Route::get('/dranceldrive{cndri}',[Urabancontroller::class,'driver_cancel_tr']);
Route::get('/driverconfirmtr{confdr}',[Urabancontroller::class,'driver_confirm_tr']);
Route::get('/drivercontact',[Urabancontroller::class,'drivercontact_view']);
Route::post('/drfeedbackaction',[Urabancontroller::class,'drfeedback_submit']);
Route::get('/driverfeedbackview',[Urabancontroller::class,'driverfeed_view']);
Route::get('/drfeedbackdelete{drfeedd}',[Urabancontroller::class,'drfeeddel_action']);