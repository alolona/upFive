<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Создание заказа
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->amount,
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'total' => $request->quantity * $product->cost,
        ]);

        // Обновляем количество товара
        $product->decrement('amount', $request->quantity);

        return redirect()->route('orders.index')->with('success', 'Товар успешно заказан!');
    }

    // Отображение заказов пользователя
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->with('product')->get();
        return view('orders.index', compact('orders'));
    }
}

