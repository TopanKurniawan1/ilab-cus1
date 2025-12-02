<!DOCTYPE html>
<html>
<head>
    <title>Daftar Lab</title>

    <link rel="stylesheet" href="{{ asset('css/student.css') }}">
    <link rel="stylesheet" href="{{ asset('css/siswa-rooms.css') }}">
</head>
<body>

<div class="logout-container">
    <a href="/logout" class="logout-btn">Logout</a>
</div>

<h2>Daftar Laboratorium</h2>

<div class="room-grid">
@foreach ($rooms as $room)
    <div class="room-card">
        <h3>{{ $room->name }}</h3>
        <p class="room-code">Kode: {{ $room->code }}</p>

        <a href="{{ route('siswa.room.detail', $room->id) }}" class="btn-detail">Detail</a>
        <a href="{{ route('siswa.room.current', $room->id) }}" class="btn-current">Tampil Sekarang</a>
    </div>
@endforeach
</div>

</body>
</html>
