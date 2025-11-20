@extends('layouts.admin')

@section('title', 'Schedules')

@section('content')

<h2 class="page-title">Schedules (Jadwal Lab)</h2>

<a href="{{ route('schedules.create') }}" class="btn-primary">Buat Jadwal Baru</a>

<div class="table-wrapper">
    <table class="table-modern">
        <thead>
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
        </thead>

        <tbody>
            @foreach ($schedules as $s)
            <tr>

                {{-- HARI --}}
                <td>{{ $s->day }}</td>

                {{-- JAM --}}
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

                {{-- KELAS --}}
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
                <td class="action-col">

                    {{-- Edit tidak muncul saat ISTIRAHAT --}}
                    @if (!($s->lesson_number == 0 || $s->lesson_number == 99))
                        <a href="{{ route('schedules.edit', $s->id) }}" class="btn-edit">Edit</a>
                    @endif

                    <form action="{{ route('schedules.destroy', $s->id) }}" 
                          method="POST"
                          class="inline-form"
                          onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Hapus</button>
                    </form>

                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
