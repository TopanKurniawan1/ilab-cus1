@extends('layouts.admin')

@section('title', 'Edit Guru')

@section('content')
<h2>Edit Guru</h2>

<form action="{{ route('teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Nama Guru</label><br>
    <input type="text" name="name" value="{{ $teacher->name }}"><br><br>

    <label>Email</label><br>
    <input type="text" name="email" value="{{ $teacher->email }}"><br><br>

    <label>Telepon</label><br>
    <input type="text" name="phone" value="{{ $teacher->phone }}"><br><br>

    <label>Foto Sekarang</label><br>
    @if($teacher->photo)
        <img src="{{ asset('storage/'.$teacher->photo) }}" width="80">
    @else
        Tidak ada foto
    @endif
    <br><br>

    <label>Ganti Foto</label><br>
    <input type="file" name="photo"><br><br>

    <button type="submit">Update</button>
</form>

@endsection
