<!DOCTYPE html>
<html>
<head>
    <title>Мои заказы</title>
</head>
<body>
<h1>Ваши заказы</h1>
@foreach($orders as $order)
    <div>
        <h3>{{ $order->product->name }}</h3>
        <p>Количество: {{ $order->quantity }}</p>
        <p>Сумма: {{ $order->total }}</p>
        <p>Статус: {{ $order->status }}</p>
    </div>
@endforeach

</body>
</html>
