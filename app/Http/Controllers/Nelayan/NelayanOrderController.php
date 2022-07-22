<?php

namespace App\Http\Controllers\Nelayan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Produk;
use App\Models\User;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Nelayan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;

class NelayanOrderController extends Controller
{
    public function index()
    {
        if(Session::has('nelayan')){
            $trans = Pembayaran::orderBy('created_at', 'desc')->get();

            $order = Order::with(['produk'])->get();
            
            $selesai = Pembayaran::with(['produk'])->orderBy('created_at', 'desc')->where('status', 'Selesai')->orWhere('status', 'Done')->get();

            $blmbayar = Pembayaran::with(['produk'])->orderBy('created_at', 'desc')->where('status', 'On Prosess')->get();

            $kemas = Pembayaran::with(['produk'])->orderBy('created_at', 'desc')->where('status', 'Barang Dikemas')->get();

            $kirim = Pembayaran::with(['produk'])->orderBy('created_at', 'desc')->where('status', 'Barang Dikirim')->get();

            return view('Nelayan.Page.DataOrder.DataOrder', compact('order', 'trans','selesai', 'blmbayar', 'kemas', 'kirim'));
        }
        else{
            return redirect()->route('loginnelayan');
        }
    }

    public function barangkirim($id)
    {
        if(Session::has('nelayan')){
            $order = Pembayaran::find($id);

            $order->status     = 'Barang Dikirim';
            $order->save();

            return redirect(route('ordernelayan.index'))->with(['success' => 'Pesanan Berhasil di Kirim']);
        }
        else{
            return redirect()->route('loginnelayan');
        }
    }
}
