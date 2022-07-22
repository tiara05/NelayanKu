<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Nelayan;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Order;
use App\Models\Pembayaran;

use Session;

class AdminDashboardController extends Controller
{
    public function index()
    {
        if(Session::has('admin')){

            $pelanggan = User::count();

            $nelayan = Nelayan::count();

            $kategori = Kategori::count();

            $produk = Produk::count();

            $order = Order::count();

            $laut = Produk::where('id_kategori', 1)->count();

            $tawar = Produk::where('id_kategori', 2)->count();

            $olahan = Produk::where('id_kategori', 3)->count();

            $trans = Pembayaran::with(['user'])->orderBy('total', 'desc')->get();

            return view('Admin.Page.Dashboard.Dashboard',  compact('nelayan', 'pelanggan', 'kategori', 'produk', 'order', 'laut', 'tawar', 'olahan', 'trans'));
        }
        else{
            return redirect()->route('loginadmin');
        }
    }
}
