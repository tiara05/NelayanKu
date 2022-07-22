<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminLoginVerifyRequest;
use Session;

use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

use App\Models\User;

class UserRegisterController extends Controller
{
    public function registeruser(Request $request)
    {
        $provinces = Province::pluck('name', 'code');

        return view('User.Auth.Register', [
            'provinces' => $provinces,
        ]);
    }

    public function proses_registeruser(Request $request)
    {
        $prov = Province::where('code', $request->provinsi)->value('name');
        $kot = City::where('code', $request->kota)->value('name');
        $kec = District::where('code', $request->kecamatan)->value('name');
        $des = Village::where('code', $request->desa)->value('name');

            User::create([
                'name'          => $request -> nama,
                'password'      => Hash::make($request -> password),
                'email'         => $request -> email,
                'alamat'        => $request -> alamat,
                'telepon'       => $request -> telepon,
                'provinsi'      => $prov,
                'kotakab'       => $kot,
                'kecamatan'     => $kec,
                'desa'          => $des,
            ]);

            $user = Auth::user();
            $request->session()->put('user', $user);
            return redirect('/loginuser')->with('success', 'Registrasi Berhasil');
    }
}
