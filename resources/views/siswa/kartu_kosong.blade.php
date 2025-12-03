<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tidak Ada Jadwal</title>

    <link rel="stylesheet" href="{{ asset('css/jadwal-simple.css') }}">
</head>

<body>

<div class="container">

    <!-- HEADER -->
    <div class="header-bar">

        <img src="{{ asset('img/logo-neskar.png') }}" class="logo">

        <div class="title-group">
            <h1>TIDAK ADA JADWAL</h1>
            <h2>{{ strtoupper($room->name) }}</h2>
        </div>

        <img src="{{ asset('img/logo-rpl.png') }}" class="logo">

    </div>

    <!-- EMPTY BOX -->
    <div class="empty-box">
        <div class="empty-title">TIDAK ADA PELAJARAN</div>

        <div class="empty-sub">
            Tidak ada mata pelajaran yang berlangsung saat ini.
        </div>

        <div class="empty-time">
            {{ date('H:i') }}
        </div>
    </div>

</div>

</body>
</html>
