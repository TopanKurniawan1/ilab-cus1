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

        {{-- HARI --}}
        <td>{{ $s->day }}</td>

        {{-- JAM PELAJARAN / ISTIRAHAT --}}
        <td>
            @if ($s->lesson_number == 0)
                Istirahat 1
            @elseif ($s->lesson_number == 99)
                Istirahat 2
            @else
                {{ $s->lesson_number }}
            @endif
        </td>

        {{-- WAKTU --}}
        <td>{{ $s->start_time }} - {{ $s->end_time }}</td>

        {{-- ROOM --}}
        <td>{{ $s->room->name }}</td>

        {{-- KELAS (Khusus istirahat kosongkan) --}}
        <td>
            @if ($s->lesson_number == 0 || $s->lesson_number == 99)
                -
            @else
                {{ $s->classRoom->name ?? '-' }}
            @endif
        </td>

        {{-- MAPEL --}}
        <td>
            @if ($s->lesson_number == 0 || $s->lesson_number == 99)
                Istirahat
            @else
                {{ $s->subject->name ?? '-' }}
            @endif
        </td>

        {{-- GURU --}}
        <td>
            @if ($s->lesson_number == 0 || $s->lesson_number == 99)
                -
            @else
                {{ $s->teacher->name ?? '-' }}
            @endif
        </td>

        {{-- AKSI --}}
        <td>
            {{-- Tombol edit tidak boleh muncul untuk istirahat --}}
            @if (!($s->lesson_number == 0 || $s->lesson_number == 99))
                <a href="{{ route('schedules.edit', $s->id) }}">Edit</a>
                |
            @endif

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
