<?php

namespace App\Http\Controllers;

use stdClass;

class ViewTestController extends Controller
{
    public function index()
    {
        // Dummy ROOM
        $room = new stdClass();
        $room->id = 0;
        $room->name = "TEST ROOM";
        $room->code = "ROOM-TEST";
        $room->photo = "/dummy/room.png"; // ← Tambahan (mengatasi error photo)

        // Dummy SCHEDULE
        $schedule = new stdClass();
        $schedule->code = "SCH-TEST";
        $schedule->start_time = "00:00";
        $schedule->end_time = "00:00";

        // Dummy SUBJECT
        $schedule->subject = new stdClass();
        $schedule->subject->name = "Test Mata Pelajaran";
        $schedule->subject->code = "SUBJ-TEST";

        // Dummy TEACHER
        $schedule->teacher = new stdClass();
        $schedule->teacher->name = "Guru Uji Coba";
        $schedule->teacher->code = "GURU-TEST";
        $schedule->teacher->photo = "/dummy/teacher.png"; // ← Tambahan

        // Dummy CLASSROOM
        $schedule->classRoom = new stdClass();
        $schedule->classRoom->name = "Kelas Uji";
        $schedule->classRoom->code = "CLS-TEST";

        return view('kartu_dinamis_test', compact('room', 'schedule'));
    }
}
