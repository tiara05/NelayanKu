<?php

namespace App\Http\Controllers\User\Marketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Produk;
use App\Models\User;
use App\Models\Favorit;
use App\Models\Nelayan;

use Session;

class MarketplaceFavoritController extends Controller
{
    public function index()
    {
        if(Session::has('user')){
            $favorit = Favorit::with(['produk', 'nelayan'])->where('id_user', Auth::user()->id)->paginate(6);

            $nelayan = Nelayan::all();

            return view('User.Page.Marketplace.Page.Favorit.Favorit', compact('favorit', 'nelayan'));
        }
        else{
            return redirect()->route('marketplace.index')->with(['success' => 'Silahkan Login Terlebih Dahulu']);
        }
    }

    public function create($id)
    {
        if(Session::has('user')){
            $produk = Produk::find($id)->id;
            $nelayan = Produk::find($id)->id_nelayan;
            $user_id = Auth::user()->id;

            $favorit = new Favorit;

            $cek = Favorit::with(['produk'])->where('id_user', Auth::user()->id)->where('id_produk', $produk)->first();

            if($cek){
                return redirect(route('marketplace.index'))->with(['success' => 'Produk Sudah Ada Di Favorit']);
            }
            else{

                $favorit->id_produk = $produk;
                $favorit->id_user = $user_id;
                $favorit->id_nelayan = $nelayan;
                $favorit->save();

                return redirect(route('favorit.index'));
            }
        }
        else{
            return redirect()->route('marketplace.index')->with(['success' => 'Silahkan Login Terlebih Dahulu']);
        }

    }

    public function delete($id)
    {
        $favorit = Favorit::find($id);
        $favorit->delete();

        return redirect(route('favorit.index'))->with(['success' => 'Delete Favorit Berhasil']);
    }
}
