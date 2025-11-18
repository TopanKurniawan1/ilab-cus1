@extends('layouts.admin')

@section('title', 'Schedules')

@section('content')

<h2>Schedules (Jadwal Lab)</h2>

<a href="{{ route('schedules.create') }}">Buat Jadwal Baru</a>
<br><br>

<table border="1" cellpadding="5">
    <tr>
        <th>Hari</th>
        <th>Jam</th>
        <th>Waktu</th>
        <th>Room</th>
        <th>Kelas</th>
        <th>Mapel</th>
        <th>Guru</th>
        <th>Aksi</th>
    </tr>

    @foreach ($schedules as $s)
    <tr>
        <td>{{ $s->day }}</td>
        <td>{{ $s->lesson_number }}</td>
        <td>{{ $s->start_time }} - {{ $s->end_time }}</td>
        <td>{{ $s->room->name }}</td>
        <td>{{ $s->classRoom->name }}</td>
        <td>{{ $s->subject->name }}</td>
        <td>{{ $s->teacher->name }}</td>

        <td>
            <a href="{{ route('schedules.edit', $s->id) }}">Edit</a>
            |
            <form action="{{ route('schedules.destroy', $s->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection
