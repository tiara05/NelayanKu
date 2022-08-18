<?php

namespace App\Http\Controllers\Nelayan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Nelayan;

use Session;

class NelayanProdukController extends Controller
{
    public function index()
    {
        if(Session::has('nelayan')){
            $produk = Produk::where('status', 'Ada')->where('id_nelayan', '=', session()->get('nelayan')->id)->paginate(7);

            return view('Nelayan.Page.DataProduk.DataProduk',  compact('produk'));
        }
        else{
            return redirect()->route('loginnelayan');
        }
    }
    
    public function create()
    {        
        $kategori = Kategori::all();
        $nelayan = Nelayan::all();

        return view('Nelayan.Page.DataProduk.Create', compact('nelayan', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaproduk'               => 'required',
            'stokproduk'               => 'required',
            'hargaproduk'              => 'required',
            'detailproduk'             => 'required',
            'kategori'                 => 'required',
        ]);

        $request->validate([
            'foto' => 'mimes:jpg,jpeg,png',
        ]);

        $user_id = session()->get('nelayan')->id;

        $produk = new Produk;

            if ($files = $request->file('foto')) {
                $destinationPath = 'dataproduk/';
                $file = $request->file('foto');
                // upload path  
    
                $profileImage = basename($request->file('foto')->getClientOriginalName(), '.' . $request->file('foto')->getClientOriginalExtension()) . "." .
                    $files->getClientOriginalExtension();
                $pathImg = $file->storeAs('', $profileImage);
                $files->move($destinationPath, $profileImage);
                $produk->foto_produk = $pathImg;
            }
            $produk->nama_produk         = $request->namaproduk;
            $produk->stok_produk         = $request->stokproduk;
            $produk->harga               = $request->hargaproduk;
            if($request->kategori == 3)
            {
                $produk->hargalangsung       = "0";
                $produk->hargabersih         = "0";
                $produk->hargafillet         = "0";
            }
            else
            {
                $produk->hargalangsung       = $request->hargaproduk+($request->hargaproduk*0.5);
                $produk->hargabersih         = $request->hargaproduk+($request->hargaproduk*1.5);
                $produk->hargafillet         = $request->hargaproduk+($request->hargaproduk*3.2);
            }
            $produk->detail_produk       = $request->detailproduk;
            $produk->id_kategori         = $request->kategori;
            $produk->id_nelayan          = $user_id;
            $produk->save();
        
        return redirect(route('produknelayan.index'))->with(['success' => 'Tambah Produk Berhasil']);

    }

    public function show($id)
    {
        $produk = Produk::with(['kategori', 'nelayan'])->findOrFail($id);
        $kategori = Kategori::where('id', '!=', $produk->id_kategori)->get();
        $nelayan = Nelayan::where('id', '!=', $produk->id_nelayan)->get();

        return view('Nelayan.Page.DataProduk.Update', compact('produk', 'nelayan', 'kategori') );
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'namaproduk'               => 'required',
            'stokproduk'               => 'required',
            'hargaproduk'              => 'required',
            'detailproduk'             => 'required',
        ]);
        
        $produk = Produk::find($id);

        $produk->nama_produk         = $request->namaproduk;
        $produk->stok_produk         = $request->stokproduk;
        $produk->harga               = $request->hargaproduk;
        $produk->detail_produk       = $request->detailproduk;
        $produk->save();

        return redirect(route('produknelayan.index'))->with(['success' => 'Ubah Produk Berhasil']);
    }

    public function delete($id)
    {
        $produk = Produk::find($id);
        
        $produk->status = 'Diarsipkan';
        $produk->save();

        return redirect(route('produknelayan.index'))->with(['success' => 'Delete Produk Berhasil']);
    }
}
