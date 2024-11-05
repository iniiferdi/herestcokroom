<?php

namespace App\Http\Controllers\Web\Front;

use Carbon\Carbon;
use Midtrans\Snap;
use App\Models\Order;
use App\Models\Address;
use App\Models\Product;
use App\Models\Payments;
use App\Models\CartItems;
use App\Models\PaymentItem;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Faker\Provider\ar_EG\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function payments(Request $request)
    {

       

        $subTotalPayment = $request->input('sub_total_payment');
        $totalPayment = $request->input('total_payment');
        $cartItemIdsString = $request->input('cart_item_id');
        $quantitiesString = $request->input('qty');
        $sizeId = $request->input('size_id');

        $cartItemIds = explode(',', $cartItemIdsString);
        $quantities = explode(',', $quantitiesString);

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $payment = new Payments();
        $payment->subtotal = $subTotalPayment;
        $payment->total = $totalPayment;



        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $totalPayment,
            )
        );


        $snapToken = Snap::getSnapToken($params);


        $payment->snap_tokens = $snapToken;
        $payment->save();


        foreach ($cartItemIds as $index => $cartItemId) {
            $paymentItem = new PaymentItem();
            $paymentItem->payment_id = $payment->id;
            $paymentItem->cart_item_id = $cartItemId;
            $paymentItem->subtotal = $subTotalPayment;
            $paymentItem->size_id = $sizeId;
            $paymentItem->quantity = $quantities[$index];
            $paymentItem->save();
        }


        return redirect()->route('payments-details', ['id' => $payment]);
    }

    public function paymentsDetails(string $id)
    {

        $paymentItems = PaymentItem::where('payment_id', $id)->with('cartItem.product')->get();


        $payment = Payments::where('id', $id)->first();


        $address = Address::where('user_id', Auth::user()->id)->first();


        return view('pages.Users.Payments.index', compact('address', 'paymentItems', 'payment'));
    }

    public function paymentsSuccess(string $id)
{
    
    $payment = Payments::where('id', $id)->first();

    $paymentItems = PaymentItem::where('payment_id', $id)->get();

    foreach ($paymentItems as $paymentItem) {
        $cartItem = CartItems::where('id', $paymentItem->cart_item_id)->first();
        $currentDate = Carbon::now();

        if ($cartItem) {
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->qty,
                'payment_id' => $payment->id,
                'total' => $paymentItem->subtotal,
                'date' => $currentDate,
                'size_id' => $cartItem->size_id
            ]);

            // Mengurangi stok ukuran produk
            $productSize = ProductSize::where('product_id', $cartItem->product_id)
                                      ->where('size_id', $cartItem->size_id)
                                      ->first();
            if ($productSize) {
                $productSize->stock -= $cartItem->qty;
                $productSize->save();
            }

            $cartItem->delete();
        }
    }

    return redirect()->route('payments-success-info');
}



    public function paymentsSuccessinfo()
    {
        return view('pages.Users.Payments.success');
    }
}
