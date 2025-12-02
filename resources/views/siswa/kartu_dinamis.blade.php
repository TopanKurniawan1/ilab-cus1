<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal</title>

    <link rel="stylesheet" href="{{ asset('css/jadwal-layout.css') }}">
</head>

<body>

<div class="container">

    <!-- =======================
         BAGIAN KIRI — TABEL
    ======================== -->
    <div class="left-table-box">

        <table class="schedule-table">

            <thead>
                <tr>
                    <th>Mapel</th>
                    <th>Jam ke</th>
                </tr>
            </thead>

            <tbody>
                @foreach($allSchedules as $item)
                <tr class="{{ $item->lesson_number == $currentLesson ? 'active-row' : '' }}">
                    <td>{{ $item->subject->name }}</td>
                    <td>{{ $item->start_time }} - {{ $item->end_time }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

    <!-- =======================
         BAGIAN KANAN — FOTO & DETAIL
    ======================== -->
    <div class="right-info-box">

        <!-- FOTO GURU -->
        <div class="photo-frame">
            <img src="{{ asset('storage/' . optional($currentSchedule->teacher)->photo) }}">
        </div>

        <!-- 3 CARD INFO -->
        <div class="info-card">{{ strtoupper(optional($currentSchedule->teacher)->name ?? '-') }}</div>
        <div class="info-card">{{ strtoupper(optional($currentSchedule->subject)->name ?? '-') }}</div>
        <div class="info-card">
            {{ optional($currentSchedule)->start_time ?? '--:--' }}
            •
            {{ optional($currentSchedule)->end_time ?? '--:--' }}
        </div>

    </div>

</div>

</body>
</html>
