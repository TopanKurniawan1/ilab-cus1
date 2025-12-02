<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tidak Ada Jadwal</title>
    <link rel="stylesheet" href="{{ asset('css/jadwal-layout.css') }}">
</head>

<body>

<div class="container">

    <!-- KIRI – STATUS SAJA -->
    <div class="left-table-box">
        <div class="status-big">
            <h1>TIDAK ADA JADWAL</h1>
            <p>Belum ada pelajaran berlangsung saat ini.</p>
            <div id="jamRealtime" class="now-time">--:--</div>
        </div>
    </div>

    <!-- KANAN – PANEL -->
    <div class="right-info-box">

        <div class="photo-frame empty-photo">
            <div class="placeholder">📘</div>
        </div>

        <div class="info-card">
            TIDAK ADA PELAJARAN
        </div>

        <div class="info-card">
            Jam Sekarang<br>
            <b id="jamRealtime2">--:--</b>
        </div>

    </div>

</div>

<script>
function updateClock() {
    const now = new Date();
    let h = String(now.getHours()).padStart(2,'0');
    let m = String(now.getMinutes()).padStart(2,'0');

    document.getElementById("jamRealtime").innerText = `${h}:${m}`;
    document.getElementById("jamRealtime2").innerText = `${h}:${m}`;
}
setInterval(updateClock, 1000);
updateClock();
</script>

</body>
</html>
