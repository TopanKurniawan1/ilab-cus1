@extends('layouts.admin')

@section('title', 'Edit Guru')

@section('content')

<div class="form-edit">

    <h2>Edit Guru</h2>

    <form action="{{ route('teachers.update', $teacher->id) }}" 
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nama Guru -->
        <div class="fe-group">
            <label>Nama Guru</label>
            <input type="text" name="name" class="fe-input"
                   value="{{ $teacher->name }}" required>
        </div>

        <!-- Email -->
        <div class="fe-group">
            <label>Email</label>
            <input type="email" name="email" class="fe-input"
                   value="{{ $teacher->email }}" required>
        </div>

        <!-- Telepon -->
        <div class="fe-group">
            <label>Telepon</label>
            <input type="text" name="phone" class="fe-input"
                   value="{{ $teacher->phone }}" required>
        </div>

        <!-- Foto sekarang -->
        <div class="fe-group">
            <label>Foto Sekarang</label>
            @if($teacher->photo)
                <img src="{{ asset('storage/'.$teacher->photo) }}" 
                     class="teacher-photo-preview">
            @else
                <p class="no-photo">Tidak ada foto</p>
            @endif
        </div>

        <!-- Upload foto baru -->
        <div class="fe-group">
            <label>Ganti Foto</label>
            <input type="file" name="photo" class="fe-input">
        </div>

        <button type="submit" class="fe-submit">Update Guru</button>

    </form>

</div>

@endsection
