<?php

namespace App\Http\Controllers\User\Marketplace;

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

class MarketplaceActivityController extends Controller
{
    public function index()
    {
        $order = Order::with(['produk'])->where('id_user', Auth::user()->id)->get();

        $trans = Pembayaran::orderBy('created_at', 'desc')->where('id_user', Auth::user()->id)->get();

        $selesai = Pembayaran::with(['produk'])->where('id_user', Auth::user()->id)->where('status', 'Selesai')->orWhere('status', 'Done')->get();

        $blmbayar = Pembayaran::with(['produk'])->where('id_user', Auth::user()->id)->where('status', 'On Prosess')->get();

        $kemas = Pembayaran::with(['produk'])->where('id_user', Auth::user()->id)->where('status', 'Barang Dikemas')->get();

        $kirim = Pembayaran::with(['produk'])->where('id_user', Auth::user()->id)->where('status', 'Barang Dikirim')->get();

        return view('User.Page.Marketplace.Page.Activity.Activity', compact('order', 'trans','selesai', 'blmbayar', 'kemas', 'kirim'));
    }

    public function barangsampai($id)
    {
            $order = Pembayaran::find($id);

            $order->status     = 'Selesai';
            $order->save();

            return redirect(route('activity.index'))->with(['success' => 'Pesanan Sudah Sampai']);
        
    }
}
