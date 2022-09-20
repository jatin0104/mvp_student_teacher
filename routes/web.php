<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Auth\TeacherLoginController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('teacher')->group(function(){
    Route::get('/create',[TeacherController::class, 'create'])->name('teacher.create');
    Route::get('/login',[TeacherLoginController::class,'show'])->name('teacher.showLogin');
    Route::post('/login',[TeacherLoginController::class,'login'])->name('teacher.login');
    Route::get('/',[TeacherController::class, 'index'])->name('teacher.dashboard');
    Route::get('/relation',[TeacherController::class, 'showRelation'])->name('relation');
    Route::get('/delete/{id}',[TeacherController::class, 'deleteStudent']);
    Route::get('/logout',[TeacherLoginController::class,'logout'])->name('teacher.logout');
});

Route::prefix('student')->group(function(){
    Route::get('/',[StudentController::class, 'index'])->name('student.showLogin');
    Route::get('/create',[StudentController::class, 'create'])->name('student.create');
    Route::get('/logout',[StudentController::class,'logout'])->name('student.logout');
});

require __DIR__.'/auth.php';
