@extends('layouts.admin')

@section('title', 'Tambah Guru')

@section('content')
<h2>Tambah Guru</h2>

<form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Nama Guru</label><br>
    <input type="text" name="name"><br><br>

    <label>Email</label><br>
    <input type="text" name="email"><br><br>

    <label>Telepon</label><br>
    <input type="text" name="phone"><br><br>

    <label>Foto</label><br>
    <input type="file" name="photo"><br><br>

    <button type="submit">Simpan</button>
</form>

@endsection
