<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {


        $query = Product::query();







        if ($request->has('categories')) {
            $query->whereIn('category_id', $request->categories);
        }


        if ($request->has('sizes')) {

            $query->whereHas('sizes', function ($q) use ($request) {
                $q->whereIn('size_id', $request->sizes);
            });
        }

        $products = $query->get();
        $categorys = Category::all();
        $sizes = Size::all();


        return view('pages.Users.Home.index', compact('products', 'categorys', 'sizes'));
    }

    public function flters(Request $request)
    {
        $priceRange = $request->input('price_range');




        // Misalnya, Anda ingin melakukan query berdasarkan rentang harga
        // Anda dapat menyesuaikan ini sesuai dengan struktur database dan model Anda

        $prices = explode('-', $priceRange);




        $minPrice = intval($prices[0]);
        $maxPrice = intval($prices[1]);


        $products = Product::whereBetween('price', array($minPrice, $maxPrice))->get();

        

        $categorys = Category::all();
        $sizes = Size::all();

        // Anda dapat mengirimkan data yang difilter ke view atau melakukan apa pun sesuai kebutuhan aplikasi Anda
        return view('pages.Users.Home.index', compact('products', 'sizes', 'categorys'));
    }
}
