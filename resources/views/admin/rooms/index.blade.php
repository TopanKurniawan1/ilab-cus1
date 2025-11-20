@extends('layouts.admin')

@section('title', 'Rooms')

@section('content')

<div class="page-container">

    <div class="header-row">
        <h2 class="page-title">Rooms (Laboratorium)</h2>

        <a href="{{ route('rooms.create') }}" class="btn-primary">
            Tambah Room
        </a>
    </div>

    <div class="table-wrapper">
        <table class="table-modern">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Room</th>
                    <th>Kode</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->code }}</td>
                    <td class="action-col">

                        <a href="{{ route('rooms.edit', $room->id) }}" class="btn-edit">Edit</a>

                        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="inline-form"
                              onsubmit="return confirm('Yakin ingin menghapus room ini?')">
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

</div>

@endsection
