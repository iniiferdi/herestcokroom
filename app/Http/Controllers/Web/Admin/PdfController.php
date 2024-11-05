<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Order;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
    public function orderFinish(){
        $orderFinishes = Order::where('status', 'finish')->get();

        $pdf = app('dompdf.wrapper');

        $pdf->loadView('pages.Admin.Reports.PDF.finish', compact('orderFinishes')) ->setPaper('a4', 'landscape');


        

        $fileName = 'oke';
       
      
       
       
        return $pdf->stream($fileName.'.pdf');


        // return view('pages.Admin.Reports.PDF.finish', compact('orderFinishes'));
       
    }
    public function orderCancelled(){
        $orderCancelled = Order::where('status', 'cancelled')->get();

        $pdf = app('dompdf.wrapper');

        $pdf->loadView('pages.Admin.Reports.PDF.cancelled', compact('orderCancelled')) ->setPaper('a4', 'landscape');


        

        $fileName = 'oke';
       
      
       
       
        return $pdf->stream($fileName.'.pdf');


        // return view('pages.Admin.Reports.PDF.finish', compact('orderFinishes'));
       
    }
    public function orderShippeds(){
        $orderShippeds = Order::where('status', 'shipped')->get();

        $pdf = app('dompdf.wrapper');

        $pdf->loadView('pages.Admin.Reports.PDF.shipped', compact('orderShippeds')) ->setPaper('a4', 'landscape');


        

        $fileName = 'oke';
       
      
       
       
        return $pdf->stream($fileName.'.pdf');


        // return view('pages.Admin.Reports.PDF.finish', compact('orderFinishes'));
       
    }
    public function orderNew(){
        $orderNew = Order::where('status', 'new')->get();

        $pdf = app('dompdf.wrapper');

        $pdf->loadView('pages.Admin.Reports.PDF.new', compact('orderNew')) ->setPaper('a4', 'landscape');


        

        $fileName = 'oke';
       
      
       
       
        return $pdf->stream($fileName.'.pdf');


        // return view('pages.Admin.Reports.PDF.finish', compact('orderFinishes'));
       
    }
    public function orderProcess(){
        $orderProcess = Order::where('status', 'process')->get();

        $pdf = app('dompdf.wrapper');

        $pdf->loadView('pages.Admin.Reports.PDF.process', compact('orderProcess')) ->setPaper('a4', 'landscape');


        

        $fileName = 'oke';
       
      
       
       
        return $pdf->stream($fileName.'.pdf');


        // return view('pages.Admin.Reports.PDF.finish', compact('orderFinishes'));
       
    }
}
