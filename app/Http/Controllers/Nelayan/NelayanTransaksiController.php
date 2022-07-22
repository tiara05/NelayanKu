<?php

namespace App\Http\Controllers\Nelayan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pembayaran;

use Session;

class NelayanTransaksiController extends Controller
{
    public function index()
    {
        if(Session::has('nelayan')){
            $trans = Pembayaran::with(['user'])->orderBy('created_at', 'desc')->paginate(7);

            return view('Nelayan.Page.DataTransaksi.DataTransaksi', compact('trans'));
        }
        else{
            return redirect()->route('loginnelayan');
        }
    }

    public function aprovepem($id)
    {
        if(Session::has('nelayan')){
            $order = Pembayaran::find($id);

            $order->status     = 'Barang Dikemas';
            $order->save();

            return redirect(route('transaksinelayan.index'))->with(['success' => 'Pesanan Berhasil di Approval']);
        }
        else{
            return redirect()->route('loginnelayan');
        }
    }
}
