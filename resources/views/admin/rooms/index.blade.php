@extends('layouts.admin')

@section('title', 'Rooms')

@section('content')
<h2>Rooms</h2>

<a href="{{ route('rooms.create') }}">Tambah Room</a>
<br><br>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nama Room</th>
        <th>Kode</th>
        <th>Aksi</th>
    </tr>

    @foreach ($rooms as $room)
    <tr>
        <td>{{ $room->id }}</td>
        <td>{{ $room->name }}</td>
        <td>{{ $room->code }}</td>
        <td>
            <a href="{{ route('rooms.edit', $room->id) }}">Edit</a> |
            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection
