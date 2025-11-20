@extends('layouts.admin')

@section('title', 'Tambah Room')

@section('content')

<div class="form-create">

    <h2>Tambah Room</h2>

    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf

        <div class="fc-group">
            <label>Nama Room</label>
            <input type="text" name="name" class="fc-input" required>
        </div>

        <div class="fc-group">
            <label>Kode Room</label>
            <input type="text" name="code" class="fc-input" required>
        </div>

        <button type="submit" class="fc-submit">Simpan</button>

    </form>

</div>

@endsection
