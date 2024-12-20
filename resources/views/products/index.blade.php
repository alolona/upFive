<!DOCTYPE html>
<html>
<head>
    <title>Товары</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<div>
    @auth
        <p>Добро пожаловать, {{ Auth::user()->name }}!</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Выйти</button>
        </form>
    @else
        <a href="{{ route('login') }}">Войти</a> | <a href="{{ route('register') }}">Регистрация</a>
    @endauth
</div>

<h1>Список товаров</h1>
<div class="products">
@foreach($products as $product)

    <div class="product-wrapper">
        <h2>{{ $product->name }}</h2>
        <p>Цена: {{ $product->cost }} руб.</p>
        <p>В наличии: {{ $product->amount }}</p>
        <a href="{{ route('products.show', $product) }}">Подробнее</a>
    </div>
@endforeach
</div>
</body>
</html>
