<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Mengajar</title>

    <link rel="stylesheet" href="{{ asset('css/jadwal-simple.css') }}">
</head>

<body>

<div class="container">

    <!-- HEADER UTAMA -->
    <div class="header-bar">

        <img src="{{ asset('img/logo-neskar.png') }}" class="logo">

        <div class="title-group">
            <h1>JADWAL MENGAJAR</h1>
            <h2>{{ strtoupper(optional($schedule->classRoom)->name ?? 'KELAS') }}</h2>
        </div>

        <img src="{{ asset('img/logo-rpl.png') }}" class="logo">

    </div>

    <!-- KONTEN BAWAH -->
    <div class="content-row">

        <!-- FOTO GURU -->
        <div class="photo-box">
            <img src="{{ asset('storage/' . optional($schedule->teacher)->photo) }}" class="teacher-photo">
        </div>

        <!-- CARD INFORMASI -->
        <div class="info-cards">

            <!-- Card 1: Nama Guru -->
            <div class="info-card">
                {{ strtoupper(optional($schedule->teacher)->name ?? '-') }}
            </div>

            <!-- Card 2: Mapel -->
            <div class="info-card">
                {{ strtoupper(optional($schedule->subject)->name ?? '-') }}
            </div>

            <!-- Card 3: Jam Pelajaran -->
            <div class="info-card">
                {{ $schedule->start_time ?? '--:--' }} - {{ $schedule->end_time ?? '--:--' }}
            </div>

        </div>

    </div>

</div>

</body>
</html>
