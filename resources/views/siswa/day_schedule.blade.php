<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Lab {{ $room->name }} - {{ $day }}</title>
    <link rel="stylesheet" href="{{ asset('css/siswa-day.css') }}">
</head>
<body>

<div class="container">
<a href="{{ url()->previous() }}" class="back-btn">← Kembali</a>

    <h2 class="title">Jadwal Lab {{ $room->name }}</h2>
    <h3 class="subtitle">Hari: {{ $day }}</h3>

    <table class="table-modern">
        <thead>
            <tr>
                <th>Jam</th>
                <th>Waktu</th>
                <th>Kelas</th>
                <th>Mapel</th>
                <th>Guru</th>
            </tr>
        </thead>

        <tbody>
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
                <td colspan="5" class="empty-row">
                    Tidak ada jadwal pada hari ini.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>

</body>
</html>
