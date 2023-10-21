<?php

namespace App\Http\Controllers\User\Marketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Favorit;
use App\Models\Review;

use Session;

class MarketplaceDetailController extends Controller
{
    public function index($id)
    {
        $kategori = Kategori::all();

        $produk = Produk::with(['nelayan'])->find($id);

        if(session()->has('user')){
            $pro = Favorit::where('id_produk', $produk->id)->where('id_user', Auth::user()->id)->get();
        }
        else{
            $pro = Favorit::where('id_produk', $produk->id)->get();
        }

        $review = Review::with(['produk'])
        ->with(['user'])
        ->where('id_produk', '=', $id)
        ->get();

        // dd($pro);
        return view('User.Page.Marketplace.Page.Detail.Detail', compact('pro', 'produk', 'kategori', 'review'));
    }
}
