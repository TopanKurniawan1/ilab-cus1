<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Lab</title>
    <link rel="stylesheet" href="{{ asset('css/jadwal.css') }}">
</head>
<body>

<div class="wrapper">

    <div class="header">
        <img src="{{ asset('img/logo-neskar.png') }}" class="logo">
        <div class="title">
            <h2>JADWAL<br>MENGAJAR LAB</h2>
            <h1>{{ $room->name }}</h1>
            <h1>{{ $room->code }}</h1>
        </div>
        <img src="{{ asset('img/logo-rpl.png') }}" class="logo">
    </div>

    <div class="content">
        <div class="photo-frame">
            <div class="photo-topbar"><span class="icon">◁ ⬤ ▢</span></div>

            <img src="{{ asset('storage/'.$schedule->teacher->photo) }}" class="photo">
        </div>

        <div class="info">
            <div class="card name">
                {{ strtoupper($schedule->teacher->name) }}
            </div>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card 95% Bootstrap</title>

    <!-- Bootstrap 5 lokal -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- CSS Custom -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

<div class="big-card shadow-lg rounded-4 p-0 text-dark position-relative">


    <!-- Bagian kiri card -->
    <div class="big-card-left p-5">

    <!-- 2 logo di pojok kiri atas -->
    <div class="position-absolute top-0 start-0 p-3 d-flex gap-2">
        <img src="img/logo-neskar.png" class="logo-small" alt="Logo 1">
        <img src="img/logo-rpl.png" class="logo-small" alt="Logo 2">
    </div>

        <div class="teks-1">
            <h2 class="smkn-1">SMKN 1 KARAWANG</h2>
            <img src="{{ asset('storage/'.$schedule->teacher->photo) }}" class="photo">
            <h3>{{ strtoupper($schedule->teacher->name) }}</h3>
            
        </div>
    </div>

    <!-- Bagian kanan card -->
 <div class="big-card-right p-5 text-dark">
    <div class="jadwal-1 text-center">
        <h2 class="fw-bold">JADWAL</h2>
        <p>{{ $day }}</p>
    </div>

    <!-- Container cards -->
    <div class="list-jadwal mt-4">

        <!-- 1 card kecil -->
        @if($prevSchedule)
        <div class="jadwal-card mb-3">
            <div class="isi-jadwal">
                {{ $prevSchedule->start_time }} - {{ $prevSchedule->end_time }}
                • {{ $prevSchedule->subject->name }}
            </div>
        </div>
        @endif

        <!-- 2 card kecil -->
        <div class="jadwal-card-now mb-3">
                {{ strtoupper($schedule->subject->name) }}
        </div>

        <!-- 3 card kecil -->
        @if($nextSchedule)
        <div class="jadwal-card mb-3">
            <div class="isi-jadwal">
                {{ $nextSchedule->start_time }} - {{ $nextSchedule->end_time }}
                • {{ $nextSchedule->subject->name }}
            </div>
        </div>
        @endif

        <div id="jam-realtime" class="jam-realtime mt-3"></div>


    </div>
</div>


    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/jam-rl.js"></script>
</body>
</html>

            <!-- WAKTU (format detik dihapus) -->
            <div class="card time">
                {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}
                –
                {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}
            </div>

            <div class="card subject">
                {{ strtoupper($schedule->subject->name) }}
            </div>
        </div>
    </div>

</div>

</body>
</html>
