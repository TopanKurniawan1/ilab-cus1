@extends('layouts.admin')

@section('title', 'Edit Room')

@section('content')

<div class="form-edit">

    <h2>Edit Room</h2>

    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama Room -->
        <div class="fe-group">
            <label>Nama Room</label>
            <input type="text" name="name" class="fe-input"
                   value="{{ $room->name }}" required>
        </div>

        <!-- Kode Room -->
        <div class="fe-group">
            <label>Kode Room</label>
            <input type="text" name="code" class="fe-input"
                   value="{{ $room->code }}" required>
        </div>

        <button type="submit" class="fe-submit">Update</button>

    </form>

</div>

@endsection
