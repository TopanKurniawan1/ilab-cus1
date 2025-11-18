@extends('layouts.admin')

@section('title', 'Tambah Subject')

@section('content')

<h2>Tambah Subject</h2>

<form action="{{ route('subjects.store') }}" method="POST">
    @csrf

    <label>Nama Mapel</label><br>
    <input type="text" name="name"><br><br>

    <label>Kode (opsional)</label><br>
    <input type="text" name="code"><br><br>

    <label>Pilih Guru Pengajar</label><br>
    <select name="teacher_id">
        <option value="">-- Pilih Guru --</option>
        @foreach ($teachers as $t)
            <option value="{{ $t->id }}">{{ $t->name }}</option>
        @endforeach
    </select>
    <br><br>

    <button type="submit">Simpan</button>

</form>

@endsection
