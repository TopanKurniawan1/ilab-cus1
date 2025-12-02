@extends('layouts.admin')

@section('title', 'Tambah Subject')

@section('content')

<div class="form-create">

    <h2>Tambah Subject</h2>

    <form action="{{ route('subjects.store') }}" method="POST">
        @csrf

        {{-- Nama Mapel --}}
        <div class="fc-group">
            <label>Nama Mapel</label>
            <input type="text" name="name" class="fc-input" required>
        </div>

        {{-- Kode Mapel --}}
        <div class="fc-group">
            <label>Kode (opsional)</label>
            <input type="text" name="code" class="fc-input">
        </div>

        {{-- Guru --}}
        <div class="fc-group">
            <label>Pilih Guru Pengajar</label>
            <select name="teacher_id" class="fc-select">
                <option value="">-- Pilih Guru --</option>
                @foreach ($teachers as $t)
                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="fc-submit">Simpan</button>

    </form>

</div>

@endsection
