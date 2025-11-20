<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Room;
use App\Models\ClassGroup;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
public function index()
{
    $schedules = Schedule::with(['room','classRoom','subject','teacher'])
        ->orderBy('day')
        ->orderByRaw("
            CASE 
                WHEN lesson_number = 0 THEN 4     -- Istirahat 1 (setelah jam 3)
                WHEN lesson_number = 99 THEN 9    -- Istirahat 2 (setelah jam 7)
                ELSE lesson_number
            END
        ")
        ->orderBy('start_time')
        ->get();

    return view('admin.schedules.index', compact('schedules'));
}

    public function create()
    {
        return view('admin.schedules.create', [
            'rooms'     => Room::all(),
            'groups'    => ClassGroup::all(),
            'subjects'  => Subject::all(),
            'teachers'  => Teacher::all(),
            'lessons'   => range(1, 10),
            'days'      => ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
        ]);
    }

    public function store(Request $req)
    {
        $req->validate([
            'room_id'    => 'required',
            'class_id'   => 'required',
            'subject_id' => 'required',
            'teacher_id' => 'required',
            'day'        => 'required',
            'lesson_number' => 'required|integer',
        ]);

        // Jam pelajaran baru
        $times = [
            1  => ['07:15','07:55'],
            2  => ['07:55','08:35'],
            3  => ['08:35','09:15'],

            // istirahat otomatis (09:15 - 09:30) akan disisipkan di bawah

            4  => ['09:30','10:10'],
            5  => ['10:10','10:50'],
            6  => ['10:50','11:30'],
            7  => ['11:30','12:10'],

            // istirahat otomatis (12:10 - 13:00) akan disisipkan di bawah

            8  => ['13:00','13:40'],
            9  => ['13:40','14:20'],
            10 => ['14:20','15:00'],
        ];

        $start = $times[$req->lesson_number][0];
        $end   = $times[$req->lesson_number][1];

        // Insert jam pelajaran normal
        Schedule::create([
            'room_id'       => $req->room_id,
            'class_id'      => $req->class_id,
            'subject_id'    => $req->subject_id,
            'teacher_id'    => $req->teacher_id,
            'day'           => $req->day,
            'lesson_number' => $req->lesson_number,
            'start_time'    => $start,
            'end_time'      => $end,
        ]);

        // ====== ISTIRAHAT 1 (09:15 - 09:30) ======
        Schedule::firstOrCreate([
            'room_id'       => $req->room_id,
            'day'           => $req->day,
            'lesson_number' => 0, // kode istirahat
        ], [
            'class_id'   => null,
            'subject_id' => null,
            'teacher_id' => null,
            'start_time' => '09:15',
            'end_time'   => '09:30',
        ]);

        // ====== ISTIRAHAT 2 (12:10 - 13:00) ======
        Schedule::firstOrCreate([
            'room_id'       => $req->room_id,
            'day'           => $req->day,
            'lesson_number' => 99, // kode istirahat
        ], [
            'class_id'   => null,
            'subject_id' => null,
            'teacher_id' => null,
            'start_time' => '12:10',
            'end_time'   => '13:00',
        ]);

        return redirect('/admin/schedules');
    }

    public function edit(Schedule $schedule)
    {
        return view('admin.schedules.edit', [
            'schedule' => $schedule,
            'rooms'    => Room::all(),
            'groups'   => ClassGroup::all(),
            'subjects' => Subject::all(),
            'teachers' => Teacher::all(),
            'days'     => ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
            'lessons'  => range(1, 10),
        ]);
    }

    public function update(Request $req, Schedule $schedule)
    {
        $req->validate([
            'room_id'       => 'required',
            'class_id'      => 'required',
            'subject_id'    => 'required',
            'teacher_id'    => 'required',
            'day'           => 'required',
            'lesson_number' => 'required|integer',
        ]);

        // Jam baru
        $times = [
            1  => ['07:15','07:55'],
            2  => ['07:55','08:35'],
            3  => ['08:35','09:15'],
            4  => ['09:30','10:10'],
            5  => ['10:10','10:50'],
            6  => ['10:50','11:30'],
            7  => ['11:30','12:10'],
            8  => ['13:00','13:40'],
            9  => ['13:40','14:20'],
            10 => ['14:20','15:00'],
        ];

        $schedule->update([
            'room_id'       => $req->room_id,
            'class_id'      => $req->class_id,
            'subject_id'    => $req->subject_id,
            'teacher_id'    => $req->teacher_id,
            'day'           => $req->day,
            'lesson_number' => $req->lesson_number,
            'start_time'    => $times[$req->lesson_number][0],
            'end_time'      => $times[$req->lesson_number][1],
        ]);

        return redirect('/admin/schedules');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect('/admin/schedules');
    }
}
