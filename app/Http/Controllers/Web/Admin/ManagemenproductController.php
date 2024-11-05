<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;

class ManagemenproductController extends Controller
{
    public function index()
{
    $categories = Category::all();
    $sizes = Size::all();
    $colors = Color::all();
    $products = Product::with('images')->get();
    
    // Initialize an empty array to hold the product stock data
    $productsStock = [];
    
    // Loop through each product and fetch its stock with size relationship
    foreach ($products as $product) {
        $productsStock[$product->id] = ProductSize::with('size')->where('product_id', $product->id)->get();
    }
   
    return view('pages.Admin.ManagaemenProducts.index', compact('categories', 'productsStock', 'sizes', 'colors','products'));
}
}
