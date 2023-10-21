<?php

namespace App\Http\Controllers\User\Marketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Produk;
use App\Models\User;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Pembayaran;
use App\Models\Nelayan;
use Illuminate\Support\Facades\Auth;
$numberorder = Str::random(5);
use Session;

class MarketplaceCheckoutController extends Controller
{
    public function index()
    {
        return view('User.Page.Marketplace.Page.Checkout.Checkout');
    }

    public function checkout()
    {
            $user = User::where('id', Auth::user()->id)->get();

            $cart = Cart::with(['produk'])->where('id_user', Auth::user()->id)->pluck('id_nelayan');

            $ca = Nelayan::whereIn('id', $cart)->get();

            $rt = Cart::with(['produk'])->whereIn('id_nelayan', $cart)->where('id_user', Auth::user()->id)->get();

            $tot = Cart::where('id_user', Auth::user()->id)->sum('harga');

            return view('User.Page.Marketplace.Page.Checkout.Checkout', compact('ca', 'tot',  'user', 'rt', 'cart'));

    }

    public function create(Request $request)
    {
            $cart =  Cart::count();        
            $user_id = Auth::user()->id;
            $cr = Cart::with(['produk'])->where('id_user', Auth::user()->id)->get();
            $numberorder = Str::random(5);

            $tot = Cart::where('id_user', Auth::user()->id)->sum('harga');

            $order = new Pembayaran;
            $order->id_user = $user_id;
            $order->no_order = $numberorder;
            $order->total = $tot;
            $order->ekspedisi =  "Paxel";
            $order->pembayaran =  "Mandiri";
            $order->save();

            foreach($cr as $c)
            {
                $ordershop = new Order;
                $ordershop->id_produk = $c->id_produk;
                $ordershop->id_nelayan = $c->id_nelayan;
                $ordershop->jumlah =  $c->jumlah;
                $ordershop->pengolahan =  $c->pengolahan;
                $ordershop->id_user = $user_id;
                $ordershop->no_order = $numberorder;
                $ordershop->id_pembayaran = $order->id;
                $ordershop->save();

                $c->delete();
            }
            return redirect(route('bayar.index', $order->id));

    }
}
