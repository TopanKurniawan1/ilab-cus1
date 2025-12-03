<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Istirahat</title>
    <link rel="stylesheet" href="{{ asset('css/jadwal-layout.css') }}">
</head>

<body>

<div class="container">

    <!-- KIRI – STATUS SAJA -->
    <div class="left-table-box">
        <div class="status-big">
            <h1>ISTIRAHAT</h1>
            <p>Silakan beristirahat sejenak.</p>
            <div class="now-time">{{ date('H:i') }}</div>
        </div>
    </div>

    <!-- KANAN – CARD STATUS -->
    <div class="right-info-box">

        <div class="photo-frame empty-photo">
            <div class="placeholder">
                ⏳
            </div>
        </div>

        <div class="info-card">
            SEDANG ISTIRAHAT
        </div>

        <div class="info-card">
            Waktu Sekarang<br>
            <b>{{ date('H:i') }}</b>
        </div>

    </div>

</div>

</body>
</html>
