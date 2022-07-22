<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Produk;
use App\Models\User;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Nelayan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;

use Session;

class AdminOrderController extends Controller
{
    public function index()
    {
        if(Session::has('admin')){
            $order = Order::with(['produk'])->get();

            $trans = Pembayaran::orderBy('created_at', 'desc')->get();

            $selesai = Pembayaran::with(['produk'])->where('status', 'Selesai')->orWhere('status', 'Done')->get();

            $blmbayar = Pembayaran::with(['produk'])->where('status', 'On Prosess')->get();

            $kemas = Pembayaran::with(['produk'])->where('status', 'Barang Dikemas')->get();

            $kirim = Pembayaran::with(['produk'])->where('status', 'Barang Dikirim')->get();
            
            return view('Admin.Page.DataOrder.DataOrder', compact('order', 'trans','selesai', 'blmbayar', 'kemas', 'kirim'));
        }
        else{
            return redirect()->route('loginadmin');
        }
    }

    public function barangkirim($id)
    {
        if(Session::has('admin')){
            $order = Pembayaran::find($id);

            $order->status     = 'Barang Dikirim';
            $order->save();

            return redirect(route('dataorder.index'))->with(['success' => 'Pesanan Berhasil di Kirim']);
        }
        else{
            return redirect()->route('loginadmin');
        }
    }
}
