<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\FrontPageController;
use App\Http\Livewire\Admin\Class\ClassComponent;
use App\Http\Livewire\Admin\Student\CreateStudentComponent;
use App\Http\Livewire\Admin\Student\EditStudentComponent;
use App\Http\Livewire\Admin\Student\IndexStudentComponent;
use App\Http\Livewire\Admin\Subject\SubjectComponent;
use App\Http\Livewire\Admin\Teacher\CreateComponent;
use App\Http\Livewire\Admin\Teacher\EditComponent;
use App\Http\Livewire\Admin\Teacher\IndexComponent;
use App\Http\Livewire\Authentication\LoginComponent;
use App\Http\Livewire\Student\StudentRegisterComponent;
use App\Http\Livewire\Teacher\TeacherIndexComponent;
use App\Http\Livewire\Teacher\TeacherMyClassComponent;
use App\Http\Livewire\Teacher\TeacherRegisterComponent;

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

/**
 * FrontPage Route
 */
Route::get('/', [FrontPageController::class, 'index']);
Route::get('/register-choose', [FrontPageController::class, 'registerChoose'])->name('register.choose');
Route::get('/register-student', StudentRegisterComponent::class)->name('register.student');
Route::get('/register-teacher', TeacherRegisterComponent::class)->name('register.teacher');
Route::get('/login', LoginComponent::class)->name('login');


/**
 * Admin Teacher Route
 */
Route::prefix('admin')->name('teacher.')->group(function() {
    Route::get('/teachers', IndexComponent::class)->name('index');
    Route::get('/teacher/create', CreateComponent::class)->name('create');
    Route::get('/teacher/{id}/edit', EditComponent::class)->name('edit');
});

/**
 * Admin Class Route
 */
Route::get('/admin/class', ClassComponent::class)->name('class.index');

/**
 * Admin Subject Route
 */
Route::get('/admin/subject', SubjectComponent::class)->name('subject.index');

/**
 * Admin Student Route
 */
Route::prefix('admin')->name('student.')->group(function() {
    Route::get('/student', IndexStudentComponent::class)->name('index');
    Route::get('/student/create', CreateStudentComponent::class)->name('create');
    Route::get('/student/{id}/edit', EditStudentComponent::class)->name('edit');
});


/**
 * Teacher Route
 */
Route::get('/teacher', TeacherIndexComponent::class)->name('index.teacher');
Route::get('/teacher/my-class', TeacherMyClassComponent::class)->name('teacher.my-class');





