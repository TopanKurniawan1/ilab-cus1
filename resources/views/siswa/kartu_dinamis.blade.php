<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Lab</title>
    <link rel="stylesheet" href="{{ asset('css/jadwal.css') }}">
</head>
<body>

<div class="wrapper">

    <div class="header">
        <img src="{{ asset('img/logo-neskar.png') }}" class="logo">
        <div class="title">
            <h2>JADWAL<br>MENGAJAR LAB</h2>
            <h1>{{ $room->name }}</h1>
            <h1>{{ $room->code }}</h1>
        </div>
        <img src="{{ asset('img/logo-rpl.png') }}" class="logo">
    </div>

    <div class="content">
        <div class="photo-frame">
            <div class="photo-topbar"><span class="icon">◁ ⬤ ▢</span></div>

            <img src="{{ asset('storage/'.$schedule->teacher->photo) }}" class="photo">
        </div>

        <div class="info">
            <div class="card name">
                {{ strtoupper($schedule->teacher->name) }}
            </div>

            <!-- WAKTU (format detik dihapus) -->
            <div class="card time">
                {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}
                –
                {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}
            </div>

            <div class="card subject">
                {{ strtoupper($schedule->subject->name) }}
            </div>
        </div>
    </div>

</div>

</body>
</html>
