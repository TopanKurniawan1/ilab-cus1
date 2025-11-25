<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Istirahat</title>

    <link rel="stylesheet" href="{{ asset('css/bigcard-istirahat.css') }}">
</head>

<body>

<div class="break-card">

    <!-- LOGO KIRI ATAS -->
    <div class="logo-wrapper">
        <img src="{{ asset('img/logo-neskar.png') }}" class="logo">
        <img src="{{ asset('img/logo-rpl.png') }}" class="logo">
    </div>

    <!-- TULISAN UTAMA -->
    <div class="break-content">
        <h1 class="break-title">ISTIRAHAT</h1>
        <h2 class="lab-name">{{ strtoupper($room->name) }}</h2>

        <p class="break-time">
            {{ $now ?? '' }}
        </p>

        <p class="break-subtitle">Silakan beristirahat sejenak.</p>
    </div>

</div>

</body>
</html>
