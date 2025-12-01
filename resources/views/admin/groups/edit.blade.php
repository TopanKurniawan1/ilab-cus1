@extends('layouts.admin')

@section('title', 'Edit Group')

@section('content')

<div class="form-edit">

    <h2>Edit Group (Kelas)</h2>

    <form action="{{ route('groups.update', $group->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="fe-group">
            <label>Nama Kelas</label>
            <input type="text" name="name" class="fe-input" value="{{ $group->name }}" required>
        </div>

        <div class="fe-group">
            <label>Jurusan</label>
            <input type="text" name="major" class="fe-input" value="{{ $group->major }}" required>
        </div>

        <div class="fe-group">
            <label>Tingkat (X / XI / XII)</label>
            <input type="text" name="level" class="fe-input" value="{{ $group->level }}" required>
        </div>

        <button type="submit" class="fe-submit">Update</button>

    </form>

</div>

@endsection
