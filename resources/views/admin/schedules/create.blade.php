@extends('layouts.admin')

@section('title', 'Tambah Jadwal')

@section('content')

<h2>Tambah Jadwal Lab</h2>

<form action="{{ route('schedules.store') }}" method="POST">
    @csrf

    <label>Pilih Hari</label><br>
    <select name="day">
        <option value="">-- Pilih Hari --</option>
        @foreach ($days as $d)
            <option value="{{ $d }}">{{ $d }}</option>
        @endforeach
    </select>
    <br><br>

    <label>Pilih Room / Lab</label><br>
    <select name="room_id">
        @foreach ($rooms as $r)
            <option value="{{ $r->id }}">{{ $r->name }}</option>
        @endforeach
    </select>
    <br><br>

    <label>Pilih Kelas</label><br>
    <select name="class_id">
        @foreach ($groups as $g)
            <option value="{{ $g->id }}">{{ $g->name }}</option>
        @endforeach
    </select>
    <br><br>

    <label>Pilih Mata Pelajaran</label><br>
    <select name="subject_id">
        @foreach ($subjects as $s)
            <option value="{{ $s->id }}">{{ $s->name }}</option>
        @endforeach
    </select>
    <br><br>

    <label>Pilih Guru Pengajar</label><br>
    <select name="teacher_id">
        @foreach ($teachers as $t)
            <option value="{{ $t->id }}">{{ $t->name }}</option>
        @endforeach
    </select>
    <br><br>

    <label>Jam Pelajaran (1 - 10)</label><br>
    <select name="lesson_number">
        @foreach ($lessons as $l)
            <option value="{{ $l }}">{{ $l }}</option>
        @endforeach
    </select>
    <br><br>

    <button type="submit">Simpan Jadwal</button>
</form>

@endsection
