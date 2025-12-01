<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tidak Ada Pelajaran</title>

    <link rel="stylesheet" href="{{ asset('css/jadwal-mengajar.css') }}">
</head>

<body>

<div class="main-card">

    <!-- HEADER -->
    <div class="header-row">

        <img src="{{ asset('img/logo-neskar.png') }}" class="logo">

        <div class="header-text">
            <h1>TIDAK ADA PELAJARAN</h1>
            <h2>{{ strtoupper($room->name) }}</h2>
        </div>

        <img src="{{ asset('img/logo-rpl.png') }}" class="logo">

    </div>

    <!-- BOX KOSONG -->
    <div class="empty-box">
        <div class="empty-title">TIDAK ADA JADWAL</div>
        <div class="empty-sub">Tidak ada mata pelajaran yang berlangsung saat ini.</div>

        <div id="jamRealtime" class="empty-time">--:--</div>
    </div>

</div>

<!-- SCRIPT JAM REALTIME -->
<script>
function updateClock() {
    const now = new Date();
    let h = String(now.getHours()).padStart(2, '0');
    let m = String(now.getMinutes()).padStart(2, '0');
    document.getElementById("jamRealtime").innerText = `${h}:${m}`;
}
setInterval(updateClock, 1000);
updateClock();
</script>

</body>
</html>
