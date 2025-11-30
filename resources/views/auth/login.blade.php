<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="/css/login.css">

</head>
<body>
<div class="card-container">
    <div class="card">

        <h2>Login</h2>

        @if(session('error'))
            <p class="msg-error">{{ session('error') }}</p>
        @endif

        @if(session('success'))
            <p class="msg-success">{{ session('success') }}</p>
        @endif

        <form method="POST" action="/login">
            @csrf

            <label>Email:</label><br>
            <input type="email" name="email" class="input-box"><br><br>

            <label>Password:</label><br>
            <input type="password" name="password" class="input-box"><br><br>

            <button type="submit" class="btn-submit">Login</button>
        </form>

        <br>
        <a href="/register" class="link-register">Register</a>

    </div>
</div>
</body>
</html>


