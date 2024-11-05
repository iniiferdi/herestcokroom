<?php

namespace App\Http\Controllers\Web\Admin;

use DB;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductSize;

class DashboardController extends Controller
{
    public function index(){
        $productTotals = Product::all()->count();
        $productOrders = Order::all()->count();
        $Orderfinish = Order::where('status' , 'finish')->count();
        $Ordercancelled = Order::where('status' , 'cancelled')->count();

        $topSellingProducts = Order::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
        ->groupBy('product_id')
        ->orderByDesc('total_quantity')
        ->take(10) // misalnya ingin menampilkan 10 produk terlaris
        ->with('product') // Load the related product
        ->get();

        $stockOuts = ProductSize::where('stock', '<=' ,0)->get();


        return view('pages.Admin.Dashboard.index', compact('productTotals','stockOuts', 'topSellingProducts', 'productOrders', 'Orderfinish', 'Ordercancelled'));
    }
}
