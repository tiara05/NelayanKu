<?php

namespace App\Http\Controllers\Nelayan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Nelayan;

use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

use Session;

class NelayanRegisterController extends Controller
{
    public function registernelayan()
    {        
        $provinces = Province::pluck('name', 'code');

        return view('Nelayan.Auth.Register', [
            'provinces' => $provinces,
        ]);
    }

    public function proses_registernelayan(Request $request)
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
            $nelayan->save();
            return redirect(route('loginnelayan'))->with(['success' => 'Berhasil Pendaftaran']);
        
    }
}
