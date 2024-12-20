<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Отображение всех товаров
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Отображение страницы одного товара
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}

