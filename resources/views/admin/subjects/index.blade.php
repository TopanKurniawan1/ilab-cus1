@extends('layouts.admin')

@section('title', 'Subjects')

@section('content')

<h2 class="page-title">Subjects (Mata Pelajaran)</h2>

<a href="{{ route('subjects.create') }}" class="btn-primary">Tambah Subject</a>

<div class="table-wrapper">
    <table class="table-modern">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Mapel</th>
                <th>Kode</th>
                <th>Guru Pengajar</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($subjects as $s)
            <tr>
                <td>{{ $s->id }}</td>
                <td>{{ $s->name }}</td>
                <td>{{ $s->code }}</td>
                <td>{{ $s->teacher ? $s->teacher->name : '-' }}</td>

                <td class="action-col">

                    <a href="{{ route('subjects.edit', $s->id) }}" class="btn-edit">
                        Edit
                    </a>

                    <form action="{{ route('subjects.destroy', $s->id) }}"
                          method="POST"
                          class="inline-form"
                          onsubmit="return confirm('Yakin ingin menghapus subject ini?')">
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
