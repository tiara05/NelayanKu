<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Pembayaran;

class PDFController extends Controller
{
    public function cetakpesanan($no_order)
    {
        $order = Order::with(['user'], ['produk'])->where('no_order', $no_order)->get();

        $trans = Pembayaran::where('no_order', $no_order)->get();

        set_time_limit(300);
        
        $pdf = PDF::loadView('Admin.Page.PDFCetakPesanan', ['order'=>$order], ['trans'=>$trans]);
    
        return $pdf->download('CetakPesanan.pdf');
    }

    public function cetaknota($no_order)
    {
        $order = Order::with(['user'], ['produk'])->where('no_order', $no_order)->get();

        $trans = Pembayaran::where('no_order', $no_order)->get();

        set_time_limit(300);
        
        $pdf = PDF::loadView('User.Page.Marketplace.PDFCetakNota', ['order'=>$order], ['trans'=>$trans]);
    
        return $pdf->download('CetakNota.pdf');
    }
}
