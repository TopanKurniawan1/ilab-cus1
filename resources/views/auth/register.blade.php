<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/regis.css') }}">
</head>
<body>

<div class="auth-container">

    <h2 class="auth-title">Register Akun</h2>

    <form method="POST" action="/register" class="auth-form">
        @csrf

        <label>Nama</label>
        <input type="text" name="name" class="input-field" required>

        <label>Email</label>
        <input type="email" name="email" class="input-field" required>

        <label>Password</label>
        <input type="password" name="password" class="input-field" required>

        <button type="submit" class="auth-btn">Daftar</button>
    </form>

    <p class="auth-link">
        Sudah punya akun? <a href="/login">Login</a>
    </p>

</div>

</body>
</html>
