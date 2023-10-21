<?php

namespace App\Http\Controllers\User\Marketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Produk;
use App\Models\User;
use App\Models\Preorder;
use App\Models\Nelayan;

use Session;

class MarketplacePreorderController extends Controller
{
    public function index()
    {
        if(Session::has('user')){
            $preorder = Preorder::with(['produk', 'nelayan'])->where('id_user', Auth::user()->id)->paginate(6);

            return view('User.Page.Marketplace.Page.Preorder.Preorder', compact('preorder'));
        }
        else{
            return redirect()->route('marketplace.index')->with(['success' => 'Silahkan Login Terlebih Dahulu']);
        }
    }

    public function show($id)
    {
        if(Session::has('user')){
            $produk = Produk::with(['nelayan'])->findOrFail($id);

            return view('User.Page.Marketplace.Page.Preorder.create', compact('produk') );
        }
        else{
            return redirect()->route('marketplace.index')->with(['success' => 'Silahkan Login Terlebih Dahulu']);
        }
    }

    public function create(Request $request)
    {
        if(Session::has('user')){
            $user_id = Auth::user()->id;

            $preorder = new Preorder;

            $preorder->id_produk = $request->idproduk;
            $preorder->id_user = $user_id;
            $preorder->id_nelayan = $request->idnelayan;
            $preorder->jumlah = $request->jumlah;
            $preorder->tanggalpesan = $request->tanggalpesan;
            $preorder->save();

            return redirect(route('preorder.index'));

        }
        else{
            return redirect()->route('marketplace.index')->with(['success' => 'Silahkan Login Terlebih Dahulu']);
        }

    }
}
