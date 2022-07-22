<?php

namespace App\Http\Controllers\User\Marketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Produk;
use App\Models\Review;
use App\Models\Order;
use App\Models\Pembayaran;

use Session;

class MarketplaceReviewController extends Controller
{
    public function index($id)
    {
            $order = Pembayaran::where('status', 'selesai')->findOrFail($id);

            $trans = Order::with(['produk'])
            ->where('id_user', Auth::user()->id)
            ->where('no_order', $order->no_order)
            ->paginate(10);

            return view('User.Page.Marketplace.Page.Review.Review', compact('trans', 'order'));
    }

    public function create($id, Request $request)
    {
            $current_date_time = date('Y-m-d H:i:s');
            
            $user_id = Auth::user()->id;

            $request->validate([
                'review'            => 'required',
                'produk'          => 'required',
                'id_pembayaran'          => 'required',
            ]);

            $trans = Order::with(['produk'])
            ->where('id_user', Auth::user()->id)
            ->where('no_order', $request->no_order) 
            ->get();

            $bayar = Pembayaran::find($request->id_pembayaran);

            $review = [];
            for($i = 1; $i <= count($request->review); $i++) {

                $review[] = [
                    'komentar' => $request->review[$i],
                    'id_produk' => $request->produk[$i],
                    'id_user' => $user_id,
                    'created_at' => $current_date_time,
                    'updated_at'    => $current_date_time,
                ];
                
            }
            Review::insert($review);

            $bayar->status = 'Done';
            $bayar->save();



            return redirect(route('marketplace.index'));
    }
}
