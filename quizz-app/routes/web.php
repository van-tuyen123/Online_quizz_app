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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin',[App\Http\Controllers\Admin::class, 'index']);
// Exam_category
Route::get('/admin/exam_category',[App\Http\Controllers\Admin::class, 'exam_category']);
Route::post('/admin/add_new_category',[App\Http\Controllers\Admin::class,'add_new_category']);
Route::get('/admin/edit_category/{id}',[App\Http\Controllers\Admin::class,'edit_category']);
Route::post('/admin/edit_new_category',[App\Http\Controllers\Admin::class,'edit_new_category']);
Route::get('/admin/delete_category/{id}',[App\Http\Controllers\Admin::class,'delete_category']);
Route::get('/admin/add_question/{id}',[App\Http\Controllers\Admin::class,'add_question']);
Route::post('/admin/add_new_question',[App\Http\Controllers\Admin::class,'add_new_question']);
Route::get('/admin/update_question/{id}',[App\Http\Controllers\Admin::class,'update_question']);
Route::post('/admin/edit_question',[App\Http\Controllers\Admin::class,'edit_question']);
Route::get('/admin/delete_question/{id}',[App\Http\Controllers\Admin::class,'delete_question']);
Route::get('/admin/logout',[App\Http\Controllers\StudentChorme::class,'logout']);
// manage_exam
Route::get('/admin/manage_exam',[App\Http\Controllers\Admin::class,'manage_exam']);
Route::post('/admin/add_new_exam',[App\Http\Controllers\Admin::class,'add_new_exam']);
Route::get('/admin/edit_exam/{id}',[App\Http\Controllers\Admin::class,'edit_exam']);
Route::post('/admin/edit_exam_sub',[App\Http\Controllers\Admin::class,'edit_exam_sub']);
Route::get('/admin/delete_exam/{id}',[App\Http\Controllers\Admin::class,'delete_exam']);

// Students
Route::get('/admin/manage_students',[App\Http\Controllers\Admin::class,'manage_students']);
Route::post('/admin/add_new_students',[App\Http\Controllers\Admin::class,'add_new_students']);
Route::get('/admin/edit_students/{id}',[App\Http\Controllers\Admin::class,'edit_students']);
Route::post('/admin/update_students',[App\Http\Controllers\Admin::class,'update_students']);
Route::get('/admin/delete_students/{id}',[App\Http\Controllers\Admin::class,'delete_students']);

// Manage Portal
Route::get('/admin/manage_portal',[App\Http\Controllers\Admin::class,'manage_portal']);
Route::post('/admin/add_new_portal',[App\Http\Controllers\Admin::class,'add_new_portal']);
Route::get('/admin/edit_portal/{id}',[App\Http\Controllers\Admin::class,'edit_portal']);
Route::post('/admin/update_portal',[App\Http\Controllers\Admin::class,'update_portal']);
Route::get('/admin/delete_portal/{id}',[App\Http\Controllers\Admin::class,'delete_portal']);


/*Portal */
Route::get('portal/signup',[App\Http\Controllers\PortalController::class,'portal_signup']);
Route::post('portal/signup_subject',[App\Http\Controllers\PortalController::class,'signup_subject']);

Route::get('portal/login',[App\Http\Controllers\PortalController::class,'login']);
Route::post('portal/login_subject',[App\Http\Controllers\PortalController::class,'login_subject']);

Route::get('portal/dashboard',[App\Http\Controllers\PortalChorme::class,'dashboard']);
Route::get('portal/exam_form/{id}',[App\Http\Controllers\PortalChorme::class,'exam_form']);
Route::post('portal/exam_submit',[App\Http\Controllers\PortalChorme::class,'exam_submit']);
Route::get('portal/print/{id}',[App\Http\Controllers\PortalChorme::class,'print']);
Route::get('portal/update_form',[App\Http\Controllers\PortalChorme::class,'update_form']);
Route::get('portal/student_exam',[App\Http\Controllers\PortalChorme::class,'student_exam']);
Route::get('portal/logout',[App\Http\Controllers\PortalChorme::class,'logout']);

Route::get('student/signup',[App\Http\Controllers\StudentController::class,'signup']);
Route::post('student/login_subject',[App\Http\Controllers\StudentController::class,'login_subject']);

Route::get('student/dashboard',[App\Http\Controllers\StudentChorme::class,'dashboard']);
Route::get('student/exam',[App\Http\Controllers\StudentChorme::class,'exam']);
Route::get('student/logout',[App\Http\Controllers\StudentChorme::class,'logout']);
Route::get('student/join_exam/{id}',[App\Http\Controllers\StudentChorme::class,'join_exam']);
Route::post('student/submit',[App\Http\Controllers\StudentChorme::class,'submit']);

/**
 *Result 
 */
Route::get('student/show_res/{id}',[App\Http\Controllers\StudentChorme::class,'show_res']);
