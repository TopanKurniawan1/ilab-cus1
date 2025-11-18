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
            ->orderBy('lesson_number')
            ->get();

        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('admin.schedules.create', [
            'rooms'     => Room::all(),
            'groups'   => ClassGroup::all(),
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

        // Jam pelajaran otomatis
        $times = [
            1 => ['07:30','08:15'],
            2 => ['08:15','09:00'],
            3 => ['09:30','10:15'],
            4 => ['10:15','11:00'],
            5 => ['11:00','11:45'],
            6 => ['12:15','13:00'],
            7 => ['13:00','13:45'],
            8 => ['13:45','14:30'],
            9 => ['14:30','15:00'],
            10 => ['15:00','15:30'],
        ];

        $start = $times[$req->lesson_number][0];
        $end   = $times[$req->lesson_number][1];

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

        return redirect('/admin/schedules');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect('/admin/schedules');
    }
}
