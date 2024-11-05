<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\CartItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;

        $address = Address::where('user_id', $userId)->where('status', 'first')->first();
        $cart = Cart::where('user_id', $userId)->first();

        $cart_items = [];
        if ($cart) {
            $cart_items = CartItems::where('cart_id', $cart->id)->with('product', 'size')->get();
        }

        return view('pages.Users.Cart.index', compact('address', 'cart_items'));
    }



    public function destroy(string $id)
    {
        $cart_items = CartItems::find($id)->delete();


        return redirect()->route('cart')->with(['success', 'Delete successfully']);
    }

    public function updateCartItemQty(Request $request, $id)
    {
        $cartItem = CartItems::find($id);
        $cartItem->qty = $request->qty;
        $cartItem->save();

        // Hitung harga baru
        $newPrice = $cartItem->qty * $cartItem->product->price;

        return response()->json(['success' => true, 'newPrice' => number_format($newPrice, 3, ',', '.')]);
    }
}
