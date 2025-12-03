<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Schedule;
use Illuminate\Http\Request;

class StudentScheduleController extends Controller
{
    // ===========================
    //        FUNGSI ASLI
    // ===========================

    public function rooms()
    {
        $rooms = Room::all();
        return view('siswa.rooms', compact('rooms'));
    }

    public function roomDetail(Room $room)
    {
        $days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
        return view('siswa.room_detail', compact('room', 'days'));
    }

    public function daySchedule(Room $room, $day)
    {
        $schedules = Schedule::with(['classRoom','teacher','subject'])
            ->where('room_id', $room->id)
            ->where('day', $day)
            ->orderByRaw("
                CASE
                    WHEN lesson_number = 0 THEN 4
                    WHEN lesson_number = 99 THEN 9
                    ELSE lesson_number
                END
            ")
            ->orderBy('start_time')
            ->get();

        return view('siswa.day_schedule', compact('room', 'day', 'schedules'));
    }

public function showCurrent(Room $room)
{
    date_default_timezone_set('Asia/Jakarta');

    $now = date('H:i');
    $day = date('l');

    // Ambil jadwal istirahat langsung dari DB
    $break1 = Schedule::where('room_id', $room->id)
        ->where('day', $day)
        ->where('lesson_number', 0)
        ->first();

    $break2 = Schedule::where('room_id', $room->id)
        ->where('day', $day)
        ->where('lesson_number', 99)
        ->first();

    // Cek apakah sekarang istirahat 1
    if ($break1 && $now >= $break1->start_time && $now < $break1->end_time) {
        return view('siswa.kartu_istirahat', [
            'room' => $room,
            'breakNumber' => 1,
            'start' => $break1->start_time,
            'end'   => $break1->end_time
        ]);
    }

    // Cek apakah sekarang istirahat 2
    if ($break2 && $now >= $break2->start_time && $now < $break2->end_time) {
        return view('siswa.kartu_istirahat', [
            'room' => $room,
            'breakNumber' => 2,
            'start' => $break2->start_time,
            'end'   => $break2->end_time
        ]);
    }

    // Ambil jadwal aktif
    $schedule = Schedule::with(['teacher','subject','classRoom'])
        ->where('room_id', $room->id)
        ->where('day', $day)
        ->where('start_time', '<=', $now)
        ->where('end_time', '>', $now)
        ->first();

    // Ambil seluruh jadwal hari ini
$allSchedules = Schedule::with(['teacher','subject'])
    ->where('room_id', $room->id)
    ->where('day', $day)
    ->orderByRaw("
        CASE
            WHEN lesson_number = 0 THEN 4   -- Istirahat 1 setelah jam ke-3
            WHEN lesson_number = 99 THEN 8  -- Istirahat 2 setelah jam ke-7
            ELSE lesson_number
        END
    ")
    ->get();

    $currentSchedule = $schedule;
    $currentLesson = $schedule->lesson_number ?? null;

    // Tidak ada pelajaran
    if (!$schedule) {
        return view('siswa.kartu_kosong', compact(
            'room',
            'allSchedules',
            'currentSchedule',
            'currentLesson'
        ));
    }

    // TAMPILKAN kartu dinamis
    return view('siswa.kartu_dinamis', compact(
        'room',
        'schedule',
        'allSchedules',
        'currentSchedule',
        'currentLesson'
    ));
}



    // ===========================
    //   FUNGSI BARU (JADWAL FULL)
    // ===========================
    public function fullSchedule(Room $room)
    {
        date_default_timezone_set('Asia/Jakarta');

        $now = date('H:i');
        $day = date('l');

        // Ambil semua jadwal hari ini
        $allSchedules = Schedule::with(['teacher','subject'])
            ->where('room_id', $room->id)
            ->where('day', $day)
            ->orderBy('lesson_number')
            ->get();

        // Ambil jadwal yang sedang berlangsung
        $currentSchedule = $allSchedules->first(function ($s) use ($now) {
            return $s->start_time <= $now && $s->end_time > $now;
        });

        $currentLesson = $currentSchedule->lesson_number ?? null;

        return view('siswa.full_schedule', compact(
            'room',
            'allSchedules',
            'currentSchedule',
            'currentLesson'
        ));
    }
}
