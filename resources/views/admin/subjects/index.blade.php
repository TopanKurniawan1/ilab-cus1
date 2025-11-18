@extends('layouts.admin')

@section('title', 'Subjects')

@section('content')

<h2>Subjects (Mata Pelajaran)</h2>

<a href="{{ route('subjects.create') }}">Tambah Subject</a>
<br><br>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nama Mapel</th>
        <th>Kode</th>
        <th>Guru Pengajar</th>
        <th>Aksi</th>
    </tr>

    @foreach ($subjects as $s)
    <tr>
        <td>{{ $s->id }}</td>
        <td>{{ $s->name }}</td>
        <td>{{ $s->code }}</td>
        <td>{{ $s->teacher ? $s->teacher->name : '-' }}</td>
        <td>
            <a href="{{ route('subjects.edit', $s->id) }}">Edit</a>
            |
            <form action="{{ route('subjects.destroy', $s->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection
