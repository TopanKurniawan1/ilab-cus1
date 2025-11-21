@extends('layouts.admin')

@section('title', 'Edit Subject')

@section('content')

<div class="form-edit">

    <h2>Edit Subject (Mata Pelajaran)</h2>

    <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama Mapel -->
        <div class="fe-group">
            <label>Nama Mapel</label>
            <input type="text" name="name" class="fe-input"
                   value="{{ $subject->name }}" required>
        </div>

        <!-- Kode Mapel -->
        <div class="fe-group">
            <label>Kode (opsional)</label>
            <input type="text" name="code" class="fe-input"
                   value="{{ $subject->code }}">
        </div>

        <!-- Guru Pengajar -->
        <div class="fe-group">
            <label>Pilih Guru Pengajar</label>
            <select name="teacher_id" class="fe-select">
                <option value="">-- Pilih Guru --</option>
                @foreach ($teachers as $t)
                    <option value="{{ $t->id }}" 
                        {{ $subject->teacher_id == $t->id ? 'selected' : '' }}>
                        {{ $t->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="fe-submit">Update Subject</button>

    </form>

</div>

@endsection
