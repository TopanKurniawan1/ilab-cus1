@extends('layouts.admin')

@section('title', 'Edit Jadwal')

@section('content')

<h2>Edit Jadwal</h2>

<form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Pilih Hari</label><br>
    <select name="day">
        @foreach ($days as $d)
            <option value="{{ $d }}" @if($schedule->day == $d) selected @endif>
                {{ $d }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Pilih Room / Lab</label><br>
    <select name="room_id">
        @foreach ($rooms as $r)
            <option value="{{ $r->id }}" @if($schedule->room_id == $r->id) selected @endif>
                {{ $r->name }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Pilih Kelas</label><br>
    <select name="class_id">
        @foreach ($groups as $g)
            <option value="{{ $g->id }}" @if($schedule->class_id == $g->id) selected @endif>
                {{ $g->name }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Pilih Mata Pelajaran</label><br>
    <select name="subject_id">
        @foreach ($subjects as $s)
            <option value="{{ $s->id }}" @if($schedule->subject_id == $s->id) selected @endif>
                {{ $s->name }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Pilih Guru Pengajar</label><br>
    <select name="teacher_id">
        @foreach ($teachers as $t)
            <option value="{{ $t->id }}" @if($schedule->teacher_id == $t->id) selected @endif>
                {{ $t->name }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Jam Pelajaran (1 - 10)</label><br>
    <select name="lesson_number">
        @foreach ($lessons as $l)
            <option value="{{ $l }}" @if($schedule->lesson_number == $l) selected @endif>
                {{ $l }}
            </option>
        @endforeach
    </select>
    <br><br>

    <button type="submit">Update Jadwal</button>
</form>

@endsection
