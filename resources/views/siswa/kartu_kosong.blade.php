<!DOCTYPE html>
<html>
<head>
    <title>Tidak Ada Jadwal</title>
    <link rel="stylesheet" href="{{ asset('css/jadwal.css') }}">
</head>
<body>

<div class="wrapper">

    <div class="header">
        <img src="{{ asset('img/logo-neskar.png') }}" class="logo">
        <div class="title">
            <h2>JADWAL LAB</h2>
            <h1>{{ $room->name }}</h1>
        </div>
        <img src="{{ asset('img/logo-rpl.png') }}" class="logo">
    </div>

    <div class="content">

        <div class="info" style="width:100%;text-align:center;">
            <div class="card subject" style="font-size:32px;">
                TIDAK ADA JADWAL SAAT INI
            </div>
        </div>

    </div>

</div>

</body>
</html>
