<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Mengajar</title>

    <link rel="stylesheet" href="{{ asset('css/jadwal-mengajar.css') }}">
</head>

<body>

<div class="main-card">

    <!-- HEADER -->
    <div class="header-row">

        <img src="{{ asset('img/logo-neskar.png') }}" class="logo">

        <div class="header-text">
            <h1>JADWAL MENGAJAR</h1>
            <h2>{{ strtoupper(optional($schedule->classRoom)->name ?? 'KELAS') }}</h2>
        </div>

        <img src="{{ asset('img/logo-rpl.png') }}" class="logo">

    </div>

    <!-- CONTENT ROW -->
    <div class="content-row">

        <!-- FOTO GURU -->
        <div class="photo-box">
            <img src="{{ asset('storage/' . optional($schedule->teacher)->photo) }}" class="teacher-photo">
        </div>

        <!-- CARD INFO -->
        <div class="info-cards">

            <div class="info-card">
                {{ strtoupper(optional($schedule->teacher)->name ?? '-') }}
            </div>

            <div class="info-card">
                {{ strtoupper(optional($schedule->subject)->name ?? '-') }}
            </div>

            <div class="info-card">
                {{ strtoupper(optional($schedule)->lesson_number ? 'JAM KE-' . $schedule->lesson_number : '') }}
                <br>
                {{ ($schedule->start_time ?? '--:--') . ' - ' . ($schedule->end_time ?? '--:--') }}
            </div>

        </div>

    </div>

</div>

</body>
</html>
