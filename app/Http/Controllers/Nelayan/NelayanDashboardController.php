<?php

namespace App\Http\Controllers\Nelayan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Order;
use App\Models\Pembayaran;

use Session;

class NelayanDashboardController extends Controller
{
    public function index()
    {
        if(Session::has('nelayan')){

            $pelanggan = User::count();

            $kategori = Kategori::count();

            $produk = Produk::where('id_nelayan', session()->get('nelayan')->id)->count();

            $order = Order::count();

            $laut = Produk::where('id_kategori', 1)->where('id_nelayan', session()->get('nelayan')->id)->count();

            $tawar = Produk::where('id_kategori', 2)->where('id_nelayan', session()->get('nelayan')->id)->count();

            $olahan = Produk::where('id_kategori', 3)->where('id_nelayan', session()->get('nelayan')->id)->count();

            $trans = Pembayaran::with(['user'])->orderBy('total', 'desc')->get();

            return view('Nelayan.Page.Dashboard.Dashboard',  compact('pelanggan', 'kategori', 'produk', 'order', 'laut', 'tawar', 'olahan', 'trans'));
        }
        else{
            return redirect()->route('loginnelayan');
        }
    }
}
