@extends('layouts.admin')

@section('title', 'Tambah Guru')

@section('content')

<div class="form-create">

    <h2>Tambah Guru</h2>

    <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nama Guru --}}
        <div class="fc-group">
            <label>Nama Guru</label>
            <input type="text" name="name" class="fc-input" required>
        </div>

        {{-- Email --}}
        <div class="fc-group">
            <label>Email</label>
            <input type="email" name="email" class="fc-input" required>
        </div>

        {{-- Telepon --}}
        <div class="fc-group">
            <label>Telepon</label>
            <input type="text" name="phone" class="fc-input">
        </div>

        {{-- Foto --}}
        <div class="fc-group">
            <label>Foto Guru</label>
            <input type="file" name="photo" class="fc-input" accept="image/*">
        </div>

        <button type="submit" class="fc-submit">Simpan</button>

    </form>

</div>

@endsection
