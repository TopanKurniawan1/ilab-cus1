<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kartu Jadwal</title>
    <link rel="stylesheet" href="{{ asset('css/jadwal.css') }}">
</head>
<body>

<div class="wrapper">

    <div class="header">
        <img src="{{ asset('img/logo-neskar.png') }}" class="logo">
        <div class="title">
            <h2>JADWAL<br>MENGAJAR KELAS</h2>
            <h1>12 RPL 2</h1>
        </div>
        <img src="{{ asset('img/logo-rpl.png') }}" class="logo">
    </div>

    <div class="content">
        <div class="photo-frame">
            <div class="photo-topbar">
                <span class="icon">◁  ⬤  ▢</span>
            </div>
            <img src="{{ asset('img/guru.jpg') }}" class="photo">
        </div>

        <div class="info">
            <div class="card name">
                HABIL ANDRIANO
            </div>

            <div class="card time">
                08.00 – 09.15
            </div>

            <div class="card subject">
                MATEMATIKA
            </div>
        </div>
    </div>

</div>

</body>
</html>
