@extends('layouts.admin')

@section('title', 'Tambah Room')

@section('content')
<h2>Tambah Room</h2>

<form action="{{ route('rooms.store') }}" method="POST">
    @csrf
    <label>Nama Room</label><br>
    <input type="text" name="name"><br><br>

    <label>Kode</label><br>
    <input type="text" name="code"><br><br>

    <button type="submit">Simpan</button>
</form>

@endsection
