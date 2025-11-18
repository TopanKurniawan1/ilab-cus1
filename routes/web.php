<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassGroupController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentScheduleController;

// Dashboard Admin
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Group Admin Routes
Route::prefix('admin')->group(function () {

    // Rooms CRUD
    Route::resource('rooms', RoomController::class);

    // Teachers CRUD
    Route::resource('teachers', TeacherController::class);

    // Groups (Kelas) CRUD
    Route::resource('groups', ClassGroupController::class);

    // Subjects CRUD
    Route::resource('subjects', SubjectController::class);

    // Schedules CRUD (HANYA HILANGKAN SHOW)
    Route::resource('schedules', ScheduleController::class)
         ->except(['show']);
});


Route::prefix('siswa')->group(function () {
    Route::get('/rooms', [StudentScheduleController::class, 'rooms'])->name('siswa.rooms');
    Route::get('/rooms/{room}', [StudentScheduleController::class, 'roomDetail'])->name('siswa.room.detail');
    Route::get('/rooms/{room}/day/{day}', [StudentScheduleController::class, 'daySchedule'])->name('siswa.room.day');
});


Route::get('/siswa/rooms/{room}/tampil', [StudentScheduleController::class, 'showCurrent'])
    ->name('siswa.room.current');

