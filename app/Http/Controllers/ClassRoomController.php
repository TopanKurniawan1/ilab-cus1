<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    public function index()
    {
        $classes = ClassRoom::all();
        return view('admin.classes.index', compact('classes'));
    }

    public function create()
    {
        return view('admin.classes.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        ClassRoom::create($request->all());
        return redirect('/admin/classes');
    }

    public function edit(ClassRoom $class)
    {
        return view('admin.classes.edit', ['class' => $class]);
    }

    public function update(Request $request, ClassRoom $class)
    {
        $class->update($request->all());
        return redirect('/admin/classes');
    }

    public function destroy(ClassRoom $class)
    {
        $class->delete();
        return redirect('/admin/classes');
    }
}
