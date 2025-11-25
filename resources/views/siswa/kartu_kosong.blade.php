<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Kosong</title>

    <link rel="stylesheet" href="{{ asset('css/bigcard-kosong.css') }}">
</head>

<body>

<div class="empty-card">

    <!-- LOGO POJOK KIRI ATAS -->
    <div class="logo-wrapper">
        <img src="{{ asset('img/logo1.png') }}" class="logo">
        <img src="{{ asset('img/logo2.png') }}" class="logo">
    </div>

    <!-- KONTEN TENGAH -->
    <div class="empty-content">
        <h1 class="empty-title">TIDAK ADA JADWAL</h1>
        <h2 class="sub-title">WAKTU PULANG</h2>

        <p class="lab-name">{{ strtoupper($room->name) }}</p>

        <p class="info-text">Semua pelajaran hari ini telah selesai.</p>
        <p class="info-text-small">Sampai jumpa besok!</p>
    </div>

</div>

</body>
</html>
