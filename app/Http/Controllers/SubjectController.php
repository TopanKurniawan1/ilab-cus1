<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('teacher')->get();
        return view('admin.subjects.index', compact('subjects'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        return view('admin.subjects.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Subject::create($request->all());
        return redirect('/admin/subjects');
    }

    public function edit(Subject $subject)
    {
        $teachers = Teacher::all();
        return view('admin.subjects.edit', compact('subject', 'teachers'));
    }

    public function update(Request $request, Subject $subject)
    {
        $subject->update($request->all());
        return redirect('/admin/subjects');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect('/admin/subjects');
    }
}
