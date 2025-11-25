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

    // Waktu sekarang
    $now = date('H:i');      

    // Hari untuk query ke database (English: Monday, Tuesday, ...)
    $dayDb = date('l');

    // Hari untuk tampilan (Indonesia: Senin, Selasa, ...)
    setlocale(LC_TIME, 'id_ID.UTF-8');
    $dayLabel = strftime('%A'); // ini yang akan dikirim ke view sebagai $day

    // Waktu istirahat
    $breaks = [
        ['09:15', '09:30'],
        ['12:15', '13:00'],
    ];

    // Jika sedang istirahat → tampilkan kartu istirahat
    foreach ($breaks as $b) {
        if ($now >= $b[0] && $now < $b[1]) {
            return view('siswa.kartu_istirahat', [
                'room' => $room,
                'day'  => $dayLabel,
            ]);
        }
    }

    // 1) Ambil JADWAL SEKARANG
    $schedule = Schedule::with(['teacher','subject','classRoom'])
        ->where('room_id', $room->id)
        ->where('day', $dayDb)
        ->where('start_time', '<=', $now)
        ->where('end_time', '>', $now)
        ->first();

    // Jika tidak ada jadwal sekarang → kartu kosong
    if (!$schedule) {
        return view('siswa.kartu_kosong', [
            'room' => $room,
            'day'  => $dayLabel,
        ]);
    }

    // 2) JADWAL SEBELUMNYA
    $prevSchedule = Schedule::with(['subject'])
        ->where('room_id', $room->id)
        ->where('day', $dayDb)
        ->where('end_time', '<=', $schedule->start_time)
        ->orderBy('end_time', 'desc')
        ->first();

    // 3) JADWAL SELANJUTNYA
    $nextSchedule = Schedule::with(['subject'])
        ->where('room_id', $room->id)
        ->where('day', $dayDb)
        ->where('start_time', '>=', $schedule->end_time)
        ->orderBy('start_time', 'asc')
        ->first();

    // Kirim semua data ke view
    return view('siswa.kartu_dinamis', [
        'room'         => $room,
        'schedule'     => $schedule,
        'prevSchedule' => $prevSchedule,
        'nextSchedule' => $nextSchedule,
        'day'          => $dayLabel,   // <- ini yang dipakai di Blade
    ]);
}

}
