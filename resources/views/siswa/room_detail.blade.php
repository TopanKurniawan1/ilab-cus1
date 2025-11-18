<!DOCTYPE html>
<html>
<head>
    <title>Detail Lab</title>
</head>
<body>

<h2>Detail Room: {{ $room->name }}</h2>

<p>Kode Lab: {{ $room->code }}</p>

<h3>Pilih Hari:</h3>

@foreach ($days as $day)
    <div style="margin-bottom:5px;">
        <a href="{{ route('siswa.room.day', [$room->id, $day]) }}">
            {{ $day }}
        </a>
    </div>
@endforeach

</body>
</html>
