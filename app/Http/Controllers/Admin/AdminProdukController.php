<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Nelayan;

use Session;

class AdminProdukController extends Controller
{
    public function index()
    {
        if(Session::has('admin')){
            $produk = Produk::where('status', 'Ada')->paginate(7);

            return view('Admin.Page.DataProduk.DataProduk',  compact('produk'));
        }
        else{
            return redirect()->route('loginadmin');
        }
    }
    
    public function create()
    {        
        $kategori = Kategori::all();
        $nelayan = Nelayan::all();

        return view('Admin.Page.DataProduk.Create', compact('nelayan', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaproduk'               => 'required',
            'stokproduk'               => 'required',
            'hargaproduk'              => 'required',
            'detailproduk'             => 'required',
            'kategori'              => 'required',
            'nelayan'             => 'required',
        ]);

        $request->validate([
            'foto' => 'mimes:jpg,jpeg,png',
        ]);

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
            $produk->detail_produk       = $request->detailproduk;
            $produk->id_kategori               = $request->kategori;
            $produk->id_nelayan       = $request->nelayan;
            $produk->save();
        
        return redirect(route('dataproduk.index'))->with(['success' => 'Tambah Produk Berhasil']);

    }

    public function show($id)
    {
        $produk = Produk::with(['kategori', 'nelayan'])->findOrFail($id);
        $kategori = Kategori::where('id', '!=', $produk->id_kategori)->get();
        $nelayan = Nelayan::where('id', '!=', $produk->id_nelayan)->get();

        return view('Admin.Page.DataProduk.Update', compact('produk', 'nelayan', 'kategori') );
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

        return redirect(route('dataproduk.index'))->with(['success' => 'Ubah Produk Berhasil']);
    }

    public function delete($id)
    {
        $produk = Produk::find($id);

        $produk->status = 'Diarsipkan';
        $produk->save();

        return redirect(route('dataproduk.index'))->with(['success' => 'Delete Produk Berhasil']);
    }
}
