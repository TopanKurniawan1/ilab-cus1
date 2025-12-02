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

        $breaks = [
            ['09:15', '09:30'],
            ['12:15', '13:00'],
        ];

        foreach ($breaks as $b) {
            if ($now >= $b[0] && $now < $b[1]) {
                return view('siswa.kartu_istirahat', compact('room'));
            }
        }

        $schedule = Schedule::with(['teacher','subject','classRoom'])
            ->where('room_id', $room->id)
            ->where('day', $day)
            ->where('start_time', '<=', $now)
            ->where('end_time', '>', $now)
            ->first();

        if (!$schedule) {
            return view('siswa.kartu_kosong', compact('room'));
        }

        return view('siswa.kartu_dinamis', compact('room', 'schedule'));
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
