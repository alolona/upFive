<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    //выгружаем данные с помощью метода get(жадная загрузка для того чтобы не делать запрос лишний раз)
    public function index()
    {
        $orders = Order::with('product', 'user')->get();
        return view('admin.index', compact('orders'));
    }

    public function approveOrder(Order $order)
    {
        if ($order->product->amount >= $order->quantity) {//проверка количества товара
            $order->status = 'approved';
            $order->save();
            $order->product->amount -= $order->quantity;
            $order->product->save();
        } else {
            return back()->withErrors('Недостаточно товара на складе.');
        }

        return back()->with('success', 'Статус заказа изменен на "Одобрен".');
    }

    public function deliverOrder(Order $order)
    {
        if ($order->status === 'approved') {
            $order->status = 'delevered';
            $order->save();
        }

        return back()->with('success', 'Статус заказа изменен на "Доставлен".');
    }
}

