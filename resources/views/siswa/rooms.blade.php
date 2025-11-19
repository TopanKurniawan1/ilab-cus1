<!DOCTYPE html>
<html>
<head>
    <title>Daftar Lab</title>
    <link rel="stylesheet" href="{{ asset('css/student.css') }}">

<div style="margin-top: 20px;">
    <a href="/logout">Logout</a>
</div>


</head>
<body>

<h2>Daftar Laboratorium</h2>

@foreach ($rooms as $room)
<div style="border:1px solid black; padding:10px; margin-bottom:10px;">
    <h3>{{ $room->name }}</h3>
    <p>Kode: {{ $room->code }}</p>

        <a href="{{ route('siswa.room.detail', $room->id) }}">Detail</a>
        <br>
        <a href="{{ route('siswa.room.current', $room->id) }}">Tampil Sekarang</a>
</div>
@endforeach

</body>
</html>
