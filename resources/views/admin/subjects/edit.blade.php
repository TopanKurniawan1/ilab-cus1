@extends('layouts.admin')

@section('title', 'Edit Subject')

@section('content')

<h2>Edit Subject</h2>

<form action="{{ route('subjects.update', $subject->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Mapel</label><br>
    <input type="text" name="name" value="{{ $subject->name }}"><br><br>

    <label>Kode</label><br>
    <input type="text" name="code" value="{{ $subject->code }}"><br><br>

    <label>Pilih Guru Pengajar</label><br>
    <select name="teacher_id">
        <option value="">-- Pilih Guru --</option>
        @foreach ($teachers as $t)
            <option value="{{ $t->id }}" 
                @if($subject->teacher_id == $t->id) selected @endif>
                {{ $t->name }}
            </option>
        @endforeach
    </select>
    <br><br>

    <button type="submit">Update</button>
</form>

@endsection
