<?php

namespace App\Http\Controllers;

use App\Models\ClassGroup;
use Illuminate\Http\Request;

class ClassGroupController extends Controller
{
    public function index()
    {
        $groups = ClassGroup::all();
        return view('admin.groups.index', compact('groups'));
    }

    public function create()
    {
        return view('admin.groups.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        ClassGroup::create($request->all());
        return redirect()->route('groups.index');
    }

    public function edit(ClassGroup $group)
    {
        return view('admin.groups.edit', compact('group'));
    }

    public function update(Request $request, ClassGroup $group)
    {
        $group->update($request->all());
        return redirect()->route('groups.index');
    }

    public function destroy(ClassGroup $group)
    {
        $group->delete();
        return redirect()->route('groups.index');
    }
}
