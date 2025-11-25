@extends('layouts.admin')

@section('title', 'Tambah Jadwal')

@section('content')

<div class="form-create">

    <h2>Tambah Jadwal Lab</h2>

    <form action="{{ route('schedules.store') }}" method="POST">
        @csrf

        {{-- Hari --}}
        <div class="fc-group">
            <label>Pilih Hari</label>
            <select name="day" class="fc-select" required>
                <option value="">-- Pilih Hari --</option>
                @foreach ($days as $d)
                    <option value="{{ $d }}">{{ $d }}</option>
                @endforeach
            </select>
        </div>

        {{-- Room --}}
        <div class="fc-group">
            <label>Pilih Room / Lab</label>
            <select name="room_id" class="fc-select" required>
                @foreach ($rooms as $r)
                    <option value="{{ $r->id }}">{{ $r->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Kelas --}}
        <div class="fc-group">
            <label>Pilih Kelas</label>
            <select name="class_id" class="fc-select" required>
                @foreach ($groups as $g)
                    <option value="{{ $g->id }}">{{ $g->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Mapel --}}
        <div class="fc-group">
            <label>Pilih Mata Pelajaran</label>
            <select name="subject_id" class="fc-select" required>
                @foreach ($subjects as $s)
                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Guru --}}
        <div class="fc-group">
            <label>Pilih Guru Pengajar</label>
            <select name="teacher_id" class="fc-select" required>
                @foreach ($teachers as $t)
                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Jam --}}
        <div class="fc-group">
            <label>Jam Pelajaran (1 - 10)</label>
            <select name="lesson_number" class="fc-select" required>
                @foreach ($lessons as $l)
                    <option value="{{ $l }}">{{ $l }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="fc-submit">Simpan Jadwal</button>

    </form>

</div>

@endsection
