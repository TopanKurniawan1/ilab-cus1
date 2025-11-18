@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h2>Dashboard iLab</h2>
    <p>Selamat datang di Sistem Penjadwalan Lab Sekolah.</p>

    <h3>Menu Utama</h3>
    <ul>
        <li><a href="{{ route('rooms.index') }}">Manage Rooms</a></li>
        <li><a href="{{ route('teachers.index') }}">Manage Teachers</a></li>
        <li><a href="{{ route('groups.index') }}">Manage Classes</a></li>
        <li><a href="{{ route('subjects.index') }}">Manage Subjects</a></li>
        <li><a href="{{ route('schedules.index') }}">Manage Schedules</a></li>
    </ul>
@endsection
