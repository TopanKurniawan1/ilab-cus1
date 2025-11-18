@extends('layouts.admin')

@section('title', 'Edit Room')

@section('content')
<h2>Edit Room</h2>

<form action="{{ route('rooms.update', $room->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Room</label><br>
    <input type="text" name="name" value="{{ $room->name }}"><br><br>

    <label>Kode</label><br>
    <input type="text" name="code" value="{{ $room->code }}"><br><br>

    <button type="submit">Update</button>
</form>

@endsection
