@extends('layouts.admin')

@section('title', 'Groups')

@section('content')

<h2>Groups (Kelas)</h2>

<a href="{{ route('groups.create') }}">Tambah Group</a>
<br><br>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nama Kelas</th>
        <th>Jurusan</th>
        <th>Tingkat</th>
        <th>Aksi</th>
    </tr>

    @foreach ($groups as $g)
    <tr>
        <td>{{ $g->id }}</td>
        <td>{{ $g->name }}</td>
        <td>{{ $g->major }}</td>
        <td>{{ $g->level }}</td>
        <td>
            <a href="{{ route('groups.edit', $g->id) }}">Edit</a>
            |
            <form action="{{ route('groups.destroy', $g->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection
