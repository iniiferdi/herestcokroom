<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Load all orders by default
        $orders = Order::all();
        return view('pages.Admin.Orders.index', compact('orders'));
    }

    public function filter(Request $request)
    {
        $status = $request->input('status');

        switch ($status) {
            case 'new':
                $orders = Order::newOrders()->get();
                break;
            case 'shipped':
                $orders = Order::shippedOrders()->get();
                break;
            case 'cancelled':
                $orders = Order::cancelledOrders()->get();
                break;
            case 'finish':
                $orders = Order::finishOrders()->get();
                break;
            case 'all':
            default:
                $orders = Order::all();
                break;
        }

        return view('pages.Admin.Orders.index', compact('orders'));
    }
    

    public function StatusNew(string $id)
    {
        $orders = Order::find($id);

        $orders->update([
            'status' => 'process'
        ]);


        return redirect()->route('orders');
    }
    public function StatusShipped(string $id)
    {
        $orders = Order::find($id);

        $orders->update([
            'status' => 'shipped'
        ]);


        return redirect()->route('orders');
    }
    public function Statusfinish(string $id)
    {
        $orders = Order::find($id);

        $orders->update([
            'status' => 'finish'
        ]);


        return redirect()->route('history');
    }
    public function Statuscancle(string $id)
{
    // Mencari pesanan berdasarkan ID
    $order = Order::find($id);

    // Jika pesanan tidak ditemukan, kembalikan dengan pesan error
    if (!$order) {
        return redirect()->route('history')->withErrors(['Order not found.']);
    }

    // Mencari produk terkait dengan pesanan
    $product = Product::where('id', $order->product_id)->first();

    // Mencari ukuran produk terkait dengan pesanan
    $productSize = ProductSize::where('product_id', $product->id)
        ->where('size_id', $order->size_id)
        ->first();

    // Jika ukuran produk tidak ditemukan, kembalikan dengan pesan error
    if (!$productSize) {
        return redirect()->route('history')->withErrors(['Product size not found.']);
    }

    // Menambahkan stok produk ukuran dengan jumlah pesanan
    $productSize->stock += $order->quantity;
    $productSize->save();

    // Mengupdate status pesanan menjadi 'cancelled'
    $order->update([
        'status' => 'cancelled'
    ]);

    // Redirect ke halaman riwayat dengan pesan sukses
    return redirect()->route('history')->with('success', 'Order cancelled successfully.');
}

}
