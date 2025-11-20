<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassGroupController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentScheduleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;



/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout']);


/*
|--------------------------------------------------------------------------
| GROUP ADMIN (PROTECTED)
|--------------------------------------------------------------------------
*/

Route::middleware('auth.custom')->prefix('admin')->group(function () {

    // Dashboard Admin
    Route::get('/', [AdminDashboardController::class, 'index'])
    ->name('admin.dashboard');

    // Rooms CRUD
    Route::resource('rooms', RoomController::class);

    // Teachers CRUD
    Route::resource('teachers', TeacherController::class);

    // Groups (Kelas) CRUD
    Route::resource('groups', ClassGroupController::class);

    // Subjects CRUD
    Route::resource('subjects', SubjectController::class);

    // Schedules CRUD (hanya hilangkan SHOW)
    Route::resource('schedules', ScheduleController::class)->except(['show']);



});



/*
|--------------------------------------------------------------------------
| GROUP SISWA (PROTECTED)
|--------------------------------------------------------------------------
*/

Route::middleware('auth.custom')->prefix('siswa')->group(function () {

    Route::get('/rooms', [StudentScheduleController::class, 'rooms'])
        ->name('siswa.rooms');

    Route::get('/rooms/{room}', [StudentScheduleController::class, 'roomDetail'])
        ->name('siswa.room.detail');

    Route::get('/rooms/{room}/day/{day}', [StudentScheduleController::class, 'daySchedule'])
        ->name('siswa.room.day');

    Route::get('/rooms/{room}/tampil', [StudentScheduleController::class, 'showCurrent'])
        ->name('siswa.room.current');
});
