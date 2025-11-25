<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Besar</title>

    <link rel="stylesheet" href="{{ asset('css/bigcard-pure.css') }}">
</head>

<body>

<div class="big-card">

    <div class="logo-wrapper">
        <img src="{{ asset('img/logo-neskar.png') }}" class="logo" alt="Logo 1">
        <img src="{{ asset('img/logo-rpl.png') }}" class="logo" alt="Logo 2">
    </div>

<!-- BAGIAN KIRI: FOTO GURU -->
<div class="teacher-photo-box">
    <img src="{{ asset('storage/' . optional($schedule->teacher)->photo) }}" class="teacher-photo" alt="Foto Guru">
    <h2 class="teacher-name">
        {{ strtoupper(optional($schedule->teacher)->name) }}
    </h2>
</div>

<!-- INFO TENGAH -->
<div class="center-info">
    <h2 class="lab-name">{{ strtoupper($room->name) }}</h2>
    <h4 class="subject-now">{{ strtoupper(optional($schedule->subject)->name) }}</h4>
    <h3 class="class-name">{{ strtoupper(optional($schedule->classRoom)->name) }}</h3>
</div>


    <div class="schedule-section">

        @if($prevSchedule)
        <div class="schedule-card previous">
            <div class="time">{{ $prevSchedule->start_time }} – {{ $prevSchedule->end_time }}</div>
            <div class="subject">{{ optional($prevSchedule->subject)->name }}</div>
        </div>
        @endif

        <div class="schedule-card now">
            <div class="time">{{ $schedule->start_time }} – {{ $schedule->end_time }}</div>
            <div class="subject">{{ strtoupper(optional($schedule->subject)->name) }}</div>
        </div>

        @if($nextSchedule)
        <div class="schedule-card next">
            <div class="time">{{ $nextSchedule->start_time }} – {{ $nextSchedule->end_time }}</div>
            <div class="subject">{{ optional($nextSchedule->subject)->name }}</div>
        </div>
        @endif

    </div>


</div>

</body>
</html>
