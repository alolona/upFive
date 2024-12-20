<!DOCTYPE html>
<html>
<head>
    <title>Авторизация</title>
</head>
<body>
<h1>Авторизация</h1>
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label for="password">Пароль:</label>
        <input type="password" name="password" required>
    </div>
    <button type="submit">Войти</button>
</form>
<p>Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a></p>
</body>
</html>
