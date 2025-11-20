@extends('layouts.admin')

@section('title', 'Teachers')

@section('content')

<h2 class="page-title">Teachers (Data Guru)</h2>

<a href="{{ route('teachers.create') }}" class="btn-primary">Tambah Guru</a>

<div class="table-wrapper">
    <table class="table-modern">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Guru</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($teachers as $t)
            <tr>
                <td>{{ $t->id }}</td>
                <td>{{ $t->name }}</td>
                <td>{{ $t->email }}</td>
                <td>{{ $t->phone }}</td>

                <td>
                    @if($t->photo)
                        <img src="{{ asset('storage/'.$t->photo) }}" class="teacher-photo">
                    @else
                        <span class="no-photo">Tidak ada foto</span>
                    @endif
                </td>

                <td class="action-col">

                    <a href="{{ route('teachers.edit', $t->id) }}" class="btn-edit">Edit</a>

                    <form action="{{ route('teachers.destroy', $t->id) }}"
                          method="POST"
                          class="inline-form"
                          onsubmit="return confirm('Yakin ingin menghapus guru ini?')">
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
