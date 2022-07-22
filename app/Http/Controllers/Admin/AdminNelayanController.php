<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Nelayan;

use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

use Session;

class AdminNelayanController extends Controller
{
    public function index()
    {
        if(Session::has('admin')){
            $nelayan = Nelayan::paginate(7);

            return view('Admin.Page.DataNelayan.DataNelayan', compact('nelayan'));
        }
        else{
            return redirect()->route('loginadmin');
        }
    }

    public function create()
    {        
        $provinces = Province::pluck('name', 'code');

        return view('Admin.Page.DataNelayan.Create', [
            'provinces' => $provinces,
        ]);
    }

    public function store(Request $request)
    {
            $request->validate([
                'nama'                  => 'required',
                'email'                 => 'required',
                'username'              => 'required',
                'password'              => 'required',
                'telepon'               => 'required',
                'provinsi'              => 'required',
                'kota'                  => 'required',
                'kecamatan'             => 'required',
                'desa'                  => 'required',
                'alamat'                => 'required',
            ]);

            $request->validate([
                'foto' => 'mimes:jpg,jpeg,png',
            ]);

            $prov = Province::where('code', $request->provinsi)->value('name');
            $kot = City::where('code', $request->kota)->value('name');
            $kec = District::where('code', $request->kecamatan)->value('name');
            $des = Village::where('code', $request->desa)->value('name');

            $nelayan = new Nelayan;

            if ($files = $request->file('foto')) {
                $destinationPath = 'datanelayan/';
                $file = $request->file('foto');
                // upload path  
    
                $profileImage = basename($request->file('foto')->getClientOriginalName(), '.' . $request->file('foto')->getClientOriginalExtension()) . "." .
                    $files->getClientOriginalExtension();
                $pathImg = $file->storeAs('', $profileImage);
                $files->move($destinationPath, $profileImage);
                $nelayan->foto = $pathImg;
            }

            $nelayan->email            = $request->email;
            $nelayan->username         = $request->username;
            $nelayan->password         = $request->password;
            $nelayan->name             = $request->nama;
            $nelayan->nomortelepon     = $request->telepon;
            $nelayan->alamat           = $request->alamat;
            $nelayan->provinsi         = $prov;
            $nelayan->kotakab          = $kot;
            $nelayan->kecamatan        = $kec;
            $nelayan->desa             = $des;
            $nelayan->status             = 'Non Aktif';
            $nelayan->save();
            return redirect(route('datanelayan.index'))->with(['success' => 'Berhasil Pendaftaran']);
        
    }

    public function show($id)
    {
        $nelayan = Nelayan::findOrFail($id);

        return view('Admin.Page.DataNelayan.Show', compact('nelayan') );
    }

    public function update($id)
    {
        
        $user = Nelayan::find($id);

        $user->status     = 'Aktif';
        $user->save();

        return redirect(route('datanelayan.index'))->with(['success' => 'Account Berhasil di Aktifkan']);
    }

    public function delete($id)
    {
        $nelayan = Nelayan::find($id);
        $nelayan->delete();

        return redirect(route('datanelayan.index'))->with(['success' => 'Delete Nelayan Berhasil']);
    }
}
