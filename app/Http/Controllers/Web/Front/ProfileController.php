<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $addresss = Address::where('user_id', Auth()->user()->id)->get();

        return view('pages.Users.profile.index', compact('addresss'));
    }
    public function history()
    {
        $products = Order::where('user_id', Auth::user()->id)->get();
        return view('pages.Users.profile.histroy', compact('products'));
    }

    public function filterUser(Request $request)
    {
        $userId = Auth::user()->id;
        $status = $request->input('status', 'all'); 

        switch ($status) {
            case 'new':
                $products = Order::where('user_id', $userId)->newOrders()->get();
                break;
            case 'shipped':
                $products = Order::where('user_id', $userId)->shippedOrders()->get();
                break;
            case 'cancelled':
                $products = Order::where('user_id', $userId)->cancelledOrders()->get();
                break;
            case 'finish':
                $products = Order::where('user_id', $userId)->finishOrders()->get();
                break;
            case 'all':
            default:
                $products = Order::where('user_id', $userId)->get();
                break;
        }

        return view('pages.Users.profile.histroy', compact('products'));
    }


    public function store(Request $request)
    {

        $adderss = new Address();
        $adderss->user_id = Auth::user()->id;
        $adderss->name = $request->name;
        $adderss->address = $request->address;
        $adderss->telp = $request->telp;
        $adderss->save();

        return redirect()->route('profile')->with(['success' => 'Created address succesffuly']);
    }
}
