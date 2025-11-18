<!DOCTYPE html>
<html>
<head>
    <title>Daftar Lab</title>
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
