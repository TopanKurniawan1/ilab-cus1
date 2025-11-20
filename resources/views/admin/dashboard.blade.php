@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="dashboard-container">

    <center><div class="dashboard-header">
        <h2>Dashboard iLab</h2>
        <p>Selamat datang di Sistem Penjadwalan Lab Sekolah.</p>
    </div></center>

    <!-- Statistik -->
    <div class="stats-grid">
        <div class="stat-card">
            <h3>{{ $rooms }}</h3>
            <p>Ruangan</p>
        </div>

        <div class="stat-card">
            <h3>{{ $teachers }}</h3>
            <p>Guru</p>
        </div>

        <div class="stat-card">
            <h3>{{ $groups }}</h3>
            <p>Kelas</p>
        </div>

        <div class="stat-card">
            <h3>{{ $subjects }}</h3>
            <p>Mata Pelajaran</p>
        </div>
    </div>

    <!-- Menu utama -->
    <h3 class="menu-title">Menu Utama</h3>

    <div class="menu-grid">
        <a href="{{ route('rooms.index') }}" class="menu-card">
            <div class="menu-icon">🏫</div>
            <p>Manage Rooms</p>
        </a>

        <a href="{{ route('teachers.index') }}" class="menu-card">
            <div class="menu-icon">👨‍🏫</div>
            <p>Manage Teachers</p>
        </a>

        <a href="{{ route('groups.index') }}" class="menu-card">
            <div class="menu-icon">👥</div>
            <p>Manage Classes</p>
        </a>

        <a href="{{ route('subjects.index') }}" class="menu-card">
            <div class="menu-icon">📘</div>
            <p>Manage Subjects</p>
        </a>

        <a href="{{ route('schedules.index') }}" class="menu-card">
            <div class="menu-icon">📅</div>
            <p>Manage Schedules</p>
        </a>

        <a href="{{ route('siswa.rooms') }}" class="menu-card">
            <div class="menu-icon">🎓</div>
            <p>Student Schedule View</p>
        </a>
    </div>

</div>
@endsection
