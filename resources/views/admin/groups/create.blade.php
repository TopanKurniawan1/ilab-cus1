@extends('layouts.admin')

@section('title', 'Tambah Group')

@section('content')

<h2>Tambah Group (Kelas)</h2>

<form action="{{ route('groups.store') }}" method="POST">
    @csrf

    <label>Nama Kelas</label><br>
    <input type="text" name="name"><br><br>

    <label>Jurusan</label><br>
    <input type="text" name="major"><br><br>

    <label>Tingkat (X / XI / XII)</label><br>
    <input type="text" name="level"><br><br>

    <button type="submit">Simpan</button>
</form>

@endsection
