@extends('layouts.admin')

@section('title', 'Teachers')

@section('content')
<h2>Teachers</h2>

<a href="{{ route('teachers.create') }}">Tambah Guru</a>
<br><br>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Telepon</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>

    @foreach ($teachers as $t)
    <tr>
        <td>{{ $t->id }}</td>
        <td>{{ $t->name }}</td>
        <td>{{ $t->email }}</td>
        <td>{{ $t->phone }}</td>
        <td>
            @if($t->photo)
                <img src="{{ asset('storage/'.$t->photo) }}" width="60">
            @else
                Tidak ada foto
            @endif
        </td>
        <td>
            <a href="{{ route('teachers.edit', $t->id) }}">Edit</a>
            |
            <form action="{{ route('teachers.destroy', $t->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
@endsection
