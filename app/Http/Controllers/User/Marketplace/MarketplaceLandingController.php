<?php

namespace App\Http\Controllers\User\Marketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Produk;


class MarketplaceLandingController extends Controller
{
    public function index(Request $request)
    {
        $keyword=$request->get('search');

        if($keyword !=null){
            $produk = Produk::with(['nelayan'])->where('status', 'Ada')->where('stok_produk', '>=', '1')->where('nama_produk', 'like', '%'.$keyword.'%')->paginate(8);
        } 

        $laut = Produk::with(['nelayan'])->where('status', 'Ada')->where('id_kategori', '=', '1')->where('stok_produk', '>=', '1')->paginate(8);

        $tawar = Produk::with(['nelayan'])->where('status', 'Ada')->where('id_kategori', '=', '2')->where('stok_produk', '>=', '1')->paginate(8);

        $olahan = Produk::with(['nelayan'])->where('status', 'Ada')->where('id_kategori', '=', '3')->where('stok_produk', '>=', '1')->paginate(8);

        $produk = Produk::with(['nelayan'])->where('status', 'Ada')->where('stok_produk', '>=', '1')->paginate(8);

        return view('User.Page.Marketplace.Page.Home.Home', compact('produk', 'laut', 'tawar', 'olahan'));
    }
}
