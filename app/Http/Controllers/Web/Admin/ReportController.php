<?php

namespace App\Http\Controllers\Web\Admin;


use App\Models\Order;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $Orderfinishs = Order::where('status', 'finish')->get();
        $Ordercancelleds = Order::where('status', 'cancelled')->get();
        $Ordershippeds = Order::where('status', 'shipped')->get();
        $Ordernews = Order::where('status', 'new')->get();
        $Orderprocess = Order::where('status', 'process')->get();

        return view('pages.Admin.Reports.index', compact('Orderfinishs', 'Ordercancelleds', 'Ordershippeds', 'Ordernews', 'Orderprocess'));
    }


    public function viewPdf()
    {
        
    }
}
