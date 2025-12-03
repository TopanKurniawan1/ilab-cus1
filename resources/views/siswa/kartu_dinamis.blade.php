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
                    <th>Guru</th>
                    <th>Jam ke</th>
                </tr>
            </thead>

            <tbody>
                @foreach($allSchedules as $item)
                <tr class="{{ $item->lesson_number == $currentLesson ? 'active-row' : '' }}">

                    <!-- MAPEL -->
                    <td>
                        @if($item->lesson_number == 0)
                            ISTIRAHAT 1
                        @elseif($item->lesson_number == 99)
                            ISTIRAHAT 2
                        @else
                            {{ optional($item->subject)->name ?? '-' }}
                        @endif
                    </td>

                    <!-- GURU -->
                    <td>
                        @if($item->lesson_number == 0 || $item->lesson_number == 99)
                            -
                        @else
                            {{ optional($item->teacher)->name ?? '-' }}
                        @endif
                    </td>

                    <!-- JAM -->
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
            @if(optional($currentSchedule->teacher)->photo)
                <img src="{{ asset('storage/' . optional($currentSchedule->teacher)->photo) }}">
            @else
                <img src="{{ asset('img/default-teacher.png') }}">
            @endif
        </div>

        <!-- 3 CARD INFO -->
    </div>

</div>

</body>
</html>
