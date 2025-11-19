<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <div style="margin-top: 20px;">
    <a href="/logout">Logout</a>
    </div>

</head>
<body>

<div id="sidebar" style="width:200px; float:left; padding:10px;">
    <h3>Admin Panel</h3>

    <ul>
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('rooms.index') }}">Rooms</a></li>
        <li><a href="{{ route('teachers.index') }}">Teachers</a></li>
        <li><a href="{{ route('groups.index') }}">Classes</a></li>
        <li><a href="{{ route('subjects.index') }}">Subjects</a></li>
        <li><a href="{{ route('schedules.index') }}">Schedules</a></li>
    </ul>

    <hr>
</div>

<div id="content" style="margin-left:220px; padding:10px;">
    @yield('content')
</div>

</body>
</html>
