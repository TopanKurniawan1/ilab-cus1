@extends('layouts.admin')

@section('title', 'Tambah Group')

@section('content')

<div class="form-create">

    <h2>Tambah Group (Kelas)</h2>

    <form action="{{ route('groups.store') }}" method="POST">
        @csrf

        <div class="fc-group">
            <label>Nama Kelas</label>
            <input type="text" name="name" class="fc-input" required>
        </div>

        <div class="fc-group">
            <label>Jurusan</label>
            <input type="text" name="major" class="fc-input" required>
        </div>

        <div class="fc-group">
            <label>Tingkat (X / XI / XII)</label>
            <input type="text" name="level" class="fc-input" required>
        </div>

        <button type="submit" class="fc-submit">Simpan</button>

    </form>

</div>

@endsection
