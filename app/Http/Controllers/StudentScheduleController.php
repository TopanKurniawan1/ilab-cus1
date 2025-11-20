<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Schedule;
use Illuminate\Http\Request;

class StudentScheduleController extends Controller
{
    // Tampilkan daftar lab dalam bentuk card
    public function rooms()
    {
        $rooms = Room::all();
        return view('siswa.rooms', compact('rooms'));
    }

    // Popup: siswa memilih hari
    public function roomDetail(Room $room)
    {
        $days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
        return view('siswa.room_detail', compact('room', 'days'));
    }

    // Tampilkan jadwal lab berdasarkan hari
public function daySchedule(Room $room, $day)
{
    $schedules = Schedule::with(['classRoom','teacher','subject'])
        ->where('room_id', $room->id)
        ->where('day', $day)
        ->orderByRaw("
            CASE
                WHEN lesson_number = 0 THEN 4   -- Istirahat 1 setelah jam 3
                WHEN lesson_number = 99 THEN 9  -- Istirahat 2 setelah jam 7
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

    $now = date('H:i');      // contoh: 08:55
    $day = date('l');        // contoh: Monday

    // Waktu istirahat
    $breaks = [
        ['09:15', '09:30'],
        ['12:15', '13:00'],
    ];

    // Cek apakah sekarang istirahat
    foreach ($breaks as $b) {
        if ($now >= $b[0] && $now < $b[1]) {
            return view('siswa.kartu_istirahat', compact('room'));
        }
    }

    // Ambil jadwal sesuai jam sekarang
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


}
