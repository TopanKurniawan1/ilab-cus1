<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Istirahat</title>

    <link rel="stylesheet" href="{{ asset('css/jadwal-simple.css') }}">
</head>

<body>

<div class="container">

    <!-- HEADER -->
    <div class="header-bar">

        <img src="{{ asset('img/logo-neskar.png') }}" class="logo">

        <div class="title-group">
            <h1>ISTIRAHAT</h1>
            <h2>{{ strtoupper($room->name) }}</h2>
        </div>

        <img src="{{ asset('img/logo-rpl.png') }}" class="logo">

    </div>

    <!-- BOX KOLOM -->
    <div class="empty-box">
        <div class="empty-title">SEDANG ISTIRAHAT</div>
        <div class="empty-sub">
            Silakan beristirahat sejenak.
        </div>
        <div class="empty-time">
            {{ date('H:i') }}
        </div>
    </div>

</div>

</body>
</html>
