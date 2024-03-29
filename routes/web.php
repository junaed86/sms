<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherAuthController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\StudentAuthController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about-us',[HomeController::class,'about'])->name('about');
Route::get('/all-courses',[HomeController::class,'course'])->name('course');

Route::get('/website.course-detail/{id}',[HomeController::class,'detail'])->name('website.course-detail');

Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/login-registration',[HomeController::class,'login'])->name('login-registration');
Route::get('/enroll/{id}',[EnrollController::class,'index'])->name('enroll');
Route::post('/confirm-enroll/{id}',[EnrollController::class,'createEnroll'])->name('enroll.confirm');

Route::get('/course-registration-detail/{id}',[StudentCourseController::class,'detail'])->name('registration.detail');
Route::get('/student-logout',[StudentAuthController::class,'logout'])->name('student.logout');


Route::get('/teacher-login',[TeacherAuthController::class,'login'])->name('teacher.login');
Route::post('/teacher-login-check',[TeacherAuthController::class,'loginCheck'])->name('teacher.login-check');
Route::post('/teacher-logout',[TeacherAuthController::class,'logout'])->name('teacher.logout');
Route::get('/teacher-dashboard',[TeacherDashboardController::class,'index'])->name('teacher.dashboard')->middleware('teacher');

Route::get('/add-course', [CourseController::class,'add'])->name('course.add')->middleware('teacher');
Route::post('/new-course', [CourseController::class,'create'])->name('course.new')->middleware('teacher');
Route::get('/manage-course', [CourseController::class,'manage'])->name('course.manage')->middleware('teacher');
Route::get('/detail-course/{id}', [CourseController::class,'detail'])->name('course.detail')->middleware('teacher');
Route::get('/edit-course/{id}', [CourseController::class,'edit'])->name('course.edit')->middleware('teacher');

Route::post('/update-course/{id}', [CourseController::class,'update'])->name('course.update')->middleware('teacher');
Route::get('/delete-course/{id}', [CourseController::class,'delete'])->name('course.delete')->middleware('teacher');



Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/add-teacher', [TeacherController::class,'add'])->name('teacher.add');
    Route::get('/manage-teacher', [TeacherController::class,'manage'])->name('teacher.manage');
    Route::post('/new-teacher', [TeacherController::class,'create'])->name('teacher.new');
    Route::get('/edit-teacher/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::post('/update-teacher/{id}', [TeacherController::class,'update'])->name('teacher.update');
    Route::get('/delete-teacher/{id}', [TeacherController::class,'delete'])->name('teacher.delete');

    Route::get('/add-user', [UserController::class,'add'])->name('user.add');
    Route::post('/new-user', [UserController::class,'create'])->name('user.new');
    Route::get('/manage-user', [UserController::class,'manage'])->name('user.manage');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('user.edit');

    Route::get('/admin-manage-course', [AdminCourseController::class, 'manage'])->name('admin.manage-course');
    Route::get('/admin-course-detail/{id}', [AdminCourseController::class, 'detail'])->name('admin.course-detail');
    Route::get('/admin-course-status/{id}', [AdminCourseController::class, 'status'])->name('admin.course-status');


});






