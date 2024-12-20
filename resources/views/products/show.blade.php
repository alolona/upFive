<!DOCTYPE html>
<html>
<head>
    <title>{{ $product->name }}</title>
</head>
<body>
<h1>{{ $product->name }}</h1>
<p>Цена: {{ $product->cost }} руб.</p>
<p>В наличии: {{ $product->amount }}</p>

@auth
    <form action="{{ route('orders.store', $product) }}" method="POST">
        @csrf
        <label for="quantity">Количество:</label>
        <input type="number" name="quantity" min="1" max="{{ $product->amount }}" required>
        <button type="submit">Заказать</button>
    </form>
@else
    <p>Для заказа необходимо <a href="/login">войти</a>.</p>
@endauth
</body>
</html>
