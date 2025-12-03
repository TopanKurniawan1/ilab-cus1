@extends('layouts.admin')

@section('title', 'Edit Jadwal')

@section('content')

<div class="form-edit">

    <h2>Edit Jadwal Lab</h2>

    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Hari -->
        <div class="fe-group">
            <label>Pilih Hari</label>
            <select name="day" class="fe-select" required>
                @foreach ($days as $d)
                    <option value="{{ $d }}" {{ $schedule->day == $d ? 'selected' : '' }}>
                        {{ $d }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Room -->
        <div class="fe-group">
            <label>Pilih Room / Lab</label>
            <select name="room_id" class="fe-select" required>
                @foreach ($rooms as $r)
                    <option value="{{ $r->id }}" {{ $schedule->room_id == $r->id ? 'selected' : '' }}>
                        {{ $r->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Kelas -->
        <div class="fe-group">
            <label>Pilih Kelas</label>
            <select name="class_id" class="fe-select" required>
                @foreach ($groups as $g)
                    <option value="{{ $g->id }}" {{ $schedule->class_id == $g->id ? 'selected' : '' }}>
                        {{ $g->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Mapel -->
        <div class="fe-group">
            <label>Pilih Mata Pelajaran</label>
            <select name="subject_id" class="fe-select" required>
                @foreach ($subjects as $s)
                    <option value="{{ $s->id }}" {{ $schedule->subject_id == $s->id ? 'selected' : '' }}>
                        {{ $s->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Guru -->
        <div class="fe-group">
            <label>Pilih Guru Pengajar</label>
            <select name="teacher_id" class="fe-select" required>
                @foreach ($teachers as $t)
                    <option value="{{ $t->id }}" {{ $schedule->teacher_id == $t->id ? 'selected' : '' }}>
                        {{ $t->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Jam Pelajaran -->
        <div class="fe-group">
            <label>Jam Pelajaran (1 - 10)</label>
            <select name="lesson_number" class="fe-select" required>
                @foreach ($lessons as $l)
                    <option value="{{ $l }}" {{ $schedule->lesson_number == $l ? 'selected' : '' }}>
                        {{ $l }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="fe-submit">Update Jadwal</button>

    </form>

</div>

@endsection
