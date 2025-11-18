<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Lab {{ $room->name }} - {{ $day }}</title>
</head>
<body>

<h2>Jadwal Lab {{ $room->name }}</h2>
<h3>Hari: {{ $day }}</h3>

<table border="1" cellpadding="5">
    <tr>
        <th>Jam</th>
        <th>Waktu</th>
        <th>Kelas</th>
        <th>Mapel</th>
        <th>Guru</th>
    </tr>

    @forelse ($schedules as $s)
    <tr>
        <td>{{ $s->lesson_number }}</td>
        <td>{{ $s->start_time }} - {{ $s->end_time }}</td>
        <td>{{ $s->classRoom->name }}</td>
        <td>{{ $s->subject->name }}</td>
        <td>{{ $s->teacher->name }}</td>
    </tr>
    @empty
    <tr>
        <td colspan="5">Tidak ada jadwal pada hari ini.</td>
    </tr>
    @endforelse
</table>

</body>
</html>
