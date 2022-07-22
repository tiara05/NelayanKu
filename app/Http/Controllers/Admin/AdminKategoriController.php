<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Kategori;

use Session;

class AdminKategoriController extends Controller
{
    public function index()
    {
        if(Session::has('admin')){
            $kategori = Kategori::paginate(7);

            return view('Admin.Page.DataKategori.DataKategori',  compact('kategori'));
        }
        else{
            return redirect()->route('loginadmin');
        }
    }
    
    public function create()
    {        
        return view('Admin.Page.DataKategori.Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namakategori'               => 'required',
        ]);

        $kategori = new Kategori;

        $kategori->nama_kategori         = $request->namakategori;
        $kategori->save();
        
        return redirect(route('datakategori.index'))->with(['success' => 'Tambah Kategori Berhasil']);

    }

    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('Admin.Page.DataKategori.Update', compact('kategori') );
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'namakategori'               => 'required',
        ]);
        
        $kategori = Kategori::find($id);

        $kategori->nama_kategori         = $request->namakategori;
        $kategori->save();

        return redirect(route('datakategori.index'))->with(['success' => 'Ubah Kategori Berhasil']);
    }

    public function delete($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect(route('datakategori.index'))->with(['success' => 'Delete Kategori Berhasil']);
    }
}
