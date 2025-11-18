@extends('layouts.admin')

@section('title', 'Edit Group')

@section('content')

<h2>Edit Group (Kelas)</h2>

<form action="{{ route('groups.update', $group->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Kelas</label><br>
    <input type="text" name="name" value="{{ $group->name }}"><br><br>

    <label>Jurusan</label><br>
    <input type="text" name="major" value="{{ $group->major }}"><br><br>

    <label>Tingkat (X / XI / XII)</label><br>
    <input type="text" name="level" value="{{ $group->level }}"><br><br>

    <button type="submit">Update</button>
</form>

@endsection
