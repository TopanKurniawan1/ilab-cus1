
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card 95% Bootstrap</title>

    <!-- Bootstrap 5 lokal -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <!-- CSS Custom -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">

<div class="big-card shadow-lg rounded-4 p-0 text-dark position-relative">


    <!-- Bagian kiri card -->
    <div class="big-card-left p-5">

    <!-- 2 logo di pojok kiri atas -->
    <div class="position-absolute top-0 start-0 p-3 d-flex gap-2">
        <img src="{{ asset('img/logo-neskar.png') }}" class="logo-small">
        <img src="{{ asset('img/logo-rpl.png') }}" class="logo-small">
    </div>

        <div class="teks-1">
            <h2 class="smkn-1">SMKN 1 KARAWANG</h2>
            <img src="img/guru.jpg" class="foto-guru" alt="foto guru"><br>
            <h3>NAMA GURU</h3>
        </div>
    </div>

    <!-- Bagian kanan card -->
 <div class="big-card-right p-5 text-dark">
    <div class="jadwal-1 text-center">
        <h2 class="fw-bold">JADWAL</h2>
        <p>Hari Senin</p>
    </div>

    <!-- Container cards -->
    <div class="list-jadwal mt-4">

        <!-- 1 card kecil -->
        <div class="jadwal-card mb-3">
            <div class="isi-jadwal">08:00 - 10:00 • Bahasa Indonesia</div>
        </div>

        <!-- 2 card kecil -->
        <div class="jadwal-card-now mb-3">
            <div class="isi-jadwal">10:00 - 12:00 • Matematika</div>
        </div>

        <!-- 3 card kecil -->
        <div class="jadwal-card mb-3">
            <div class="isi-jadwal">13:00 - 15:00 • Pemrograman Web</div>
        </div>

        <div id="jam-realtime" class="jam-realtime mt-3"></div>


    </div>
</div>


    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/jam-rl.js"></script>
</body>
</html>
