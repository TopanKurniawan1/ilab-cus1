@extends('layouts.admin')

@section('title', 'Groups')

@section('content')

<h2 class="page-title">Groups (Kelas)</h2>

<a href="{{ route('groups.create') }}" class="btn-primary">Tambah Group</a>


<div class="table-wrapper">
    <table class="table-modern">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kelas</th>
                <th>Jurusan</th>
                <th>Tingkat</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($groups as $g)
            <tr>
                <td>{{ $g->id }}</td>
                <td>{{ $g->name }}</td>
                <td>{{ $g->major }}</td>
                <td>{{ $g->level }}</td>
                <td class="action-col">
                    <a href="{{ route('groups.edit', $g->id) }}" class="btn-edit">Edit</a>
                    <form action="{{ route('groups.destroy', $g->id) }}" method="POST" class="inline-form">
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


