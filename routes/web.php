<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\batchcontroller;
use App\Http\Controllers\categorycontroller;
// use App\Http\Controllers\course_addscontroller;
use App\Http\Controllers\coursecontroller;
use App\Http\Controllers\facultycontroller;
use App\Http\Controllers\frontendcontroller;
use App\Http\Controllers\registercontroller;
use App\Http\Controllers\studentcontroller;
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
                                // admin dashboard controller start 
Route::get('/admin', function () {
    return view('admin/dashboard');
})->middleware('logincheck');

Route::resource('category',categorycontroller::class)->middleware('logincheck');
Route::resource('course',coursecontroller::class)->middleware('logincheck');
Route::resource('faculty',facultycontroller::class)->middleware('logincheck');
Route::resource('admin_register',registercontroller::class);
Route::get('admin_login', function () {
    return view('admin/login');
});
Route::post('admin_logins',[admincontroller::class,'loginprocess']);
Route::get('admin_logout',[admincontroller::class,'logoutprocess']);
Route::get('students',[admincontroller::class,'studentregister'])->middleware('logincheck');
Route::delete('studentdelete/{id}',[admincontroller::class,'studentdeletefun'])->middleware('logincheck');
Route::resource('batch',batchcontroller::class)->middleware('logincheck');
Route::get('addfees',[admincontroller::class,'fees'])->middleware('logincheck');
Route::get('fetchcourse/{id}',[admincontroller::class,'fetchcourses']);
Route::post('addfee/{id}',[admincontroller::class,'paidfee'])->middleware('logincheck');
Route::get('showfee/{id}',[admincontroller::class,'showfees'])->middleware('logincheck');
Route::get('fetchapplycourses',[admincontroller::class,'fetchfees'])->middleware('logincheck');  // this is for apply course fetch for active
Route::get('applycoursefetch/{id}',[admincontroller::class,'applycoursefetchs'])->middleware('logincheck');
// Route::resource('course_request',course_addscontroller::class)->middleware('logincheck');                                  
Route::get('showcontact',[admincontroller::class,'showcontacts'])->middleware('logincheck');
Route::post('deletecontact/{id}',[admincontroller::class,'deletecontacts'])->middleware('logincheck');
Route::get('fetchbatch/{id}',[admincontroller::class,'fetchbatchtimes'])->middleware('logincheck');
Route::get('course_request_delete',[admincontroller::class,'coursesdeletes'])->middleware('logincheck');
Route::get('course_fetch_d/{id}',[admincontroller::class,'course_fetch'])->middleware('logincheck'); // this is for apply course fetch for delete
// Route::post('Delete_course_adds',[admincontroller::class,'delete_courses_adds'])->middleware('logincheck');
Route::get('student_details',[admincontroller::class,'showstudentdetails'])->middleware('logincheck');
                                // admin dashboard controller end


                              //frontend controller start
Route::get('/', function () {
return view('student/index');
});                
// Route::get('about',function(){
//     return view('student/about');
// });       
Route::get('register',[studentcontroller::class,'student_register']);
Route::get('login',[studentcontroller::class,'student_login']);
Route::post('studentstore',[studentcontroller::class,'store']);
Route::get('courses',[studentcontroller::class,'courses']);   
Route::post('student_login',[studentcontroller::class,'studentlogins']);
Route::get('logout',[studentcontroller::class,'studentlogouts']);
Route::post('studentcourseadd/{id}',[studentcontroller::class,'studentcourseadds']);
Route::get('student_dashboard',[studentcontroller::class,'studentdashboards'])->middleware('studentlogincheck');
Route::get('applied_courses',[studentcontroller::class,'showappliedcourses'])->middleware('studentlogincheck');
Route::delete('appliedcoursedelete/{id}',[studentcontroller::class,'appliedcoursedeletes'])->middleware('studentlogincheck');
Route::get('updatestudentfetch',[studentcontroller::class,'updatestudentfetchdatas'])->middleware('studentlogincheck');
Route::post('updatestudent/{id}',[studentcontroller::class,'updatestudents'])->middleware('studentlogincheck')->name('updatestudent');
Route::get('contact',[studentcontroller::class,'contacts']);
Route::get('about',[studentcontroller::class,'abouts']);
Route::get('our_courses/{id}',[studentcontroller::class,'single_page'])->name('our_courses/');
Route::post('addcontact',[studentcontroller::class,'addcontacts']);
Route::get('fees_structure',[studentcontroller::class,'studentfees'])->middleware('studentlogincheck');
                                    //end frontend controller