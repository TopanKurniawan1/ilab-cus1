<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Jadwal</title>

    <link rel="stylesheet" href="{{ asset('css/index-jadwal.css') }}">
</head>

<body>

<!-- CARD BESAR ATAS -->
<div class="top-card">

    <!-- LOGO-KIRI -->
    <div class="left-logos">
        <img src="{{ asset('img/logo-neskar.png') }}" class="logo">
        <img src="{{ asset('img/logo-rpl.png') }}" class="logo">
    </div>

    <!-- KONTEN KANAN (nanti bisa diisi judul / tombol) -->
    <div class="right-content">
        <h1 class="title">Jadwal Laboratorium</h1>
        <p class="subtitle">SMKN 1 KARAWANG</p>
    </div>

</div>

<!-- INFO LAB & KELAS -->
<div class="lab-class-info">
    <h2 class="lab-name">{{ strtoupper($room->name) }}</h2>
    <h3 class="class-name">{{ strtoupper(optional($schedule->classRoom)->name) }}</h3>
</div>


<!-- FOTO GURU DI TENGAH BAWAH -->
<!-- FOTO GURU DI TENGAH BAWAH -->
<div class="teacher-photo-wrapper">
    <div class="teacher-photo-box">
        
        <img src="{{ asset('storage/' . optional($schedule->teacher)->photo) }}" 
             alt="Foto Guru" 
             class="teacher-photo-circle">

        <p class="teacher-name">
            {{ strtoupper(optional($schedule->teacher)->name) }}
        </p>

                <div class="schedule-list">

            @if($prevSchedule)
            <div class="schedule-card prev">
                <div class="time">{{ $prevSchedule->start_time }} – {{ $prevSchedule->end_time }}</div>
                <div class="subject">{{ optional($prevSchedule->subject)->name }}</div>
            </div>
            @endif

            <div class="schedule-card now">
                <div class="time">{{ $schedule->start_time }} – {{ $schedule->end_time }}</div>
                <div class="subject">{{ strtoupper(optional($schedule->subject)->name) }}</div>
            </div>

            @if($nextSchedule)
            <div class="schedule-card next">
                <div class="time">{{ $nextSchedule->start_time }} – {{ $nextSchedule->end_time }}</div>
                <div class="subject">{{ optional($nextSchedule->subject)->name }}</div>
            </div>
            @endif

        </div>

    </div>
</div>


</body>
</html>
