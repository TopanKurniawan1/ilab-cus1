<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Teacher;
use App\Models\ClassGroup;
use App\Models\Subject;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'rooms'    => Room::count(),
            'teachers' => Teacher::count(),
            'groups'   => ClassGroup::count(),
            'subjects' => Subject::count(),
        ]);
    }
}
