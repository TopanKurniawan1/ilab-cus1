<!DOCTYPE html>
<html>
<head>
    <title>Detail Lab</title>
    <link rel="stylesheet" href="{{ asset('css/siswa-detail.css') }}">
</head>
<body>

<div class="detail-container">
    
<a href="/siswa/rooms" class="back-btn">← Kembali</a>

    <h2 class="title">Detail Room: {{ $room->name }}</h2>

    <p class="lab-code">Kode Lab: <b>{{ $room->code }}</b></p>

    <h3 class="subtitle">Pilih Hari:</h3>

    <div class="day-wrapper">
        @foreach ($days as $day)
            <a class="day-button" href="{{ route('siswa.room.day', [$room->id, $day]) }}">
                {{ $day }}
            </a>
        @endforeach
    </div>

</div>

</body>
</html>
