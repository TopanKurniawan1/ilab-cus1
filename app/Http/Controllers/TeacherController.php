<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'photo' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->photo->store('teachers', 'public');
        }

        Teacher::create($data);
        return redirect('/admin/teachers');
    }

    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->photo->store('teachers', 'public');
        }

        $teacher->update($data);
        return redirect('/admin/teachers');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect('/admin/teachers');
    }
}
