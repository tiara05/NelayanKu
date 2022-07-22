<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pembayaran;

use Session;

class AdminTransaksiController extends Controller
{
    public function index()
    {
        if(Session::has('admin')){
            $trans = Pembayaran::with(['user'])->paginate(7);

            return view('Admin.Page.DataTransaksi.DataTransaksi', compact('trans'));
        }
        else{
            return redirect()->route('loginadmin');
        }
    }

    public function aprovepem($id)
    {
        if(Session::has('admin')){
            $order = Pembayaran::find($id);

            $order->status     = 'Barang Dikemas';
            $order->save();

            return redirect(route('transaksinelayan.index'))->with(['success' => 'Pesanan Berhasil di Approval']);
        }
        else{
            return redirect()->route('loginadmin');
        }
    }
}
