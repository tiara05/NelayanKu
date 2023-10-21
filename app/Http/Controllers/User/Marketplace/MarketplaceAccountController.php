<?php

namespace App\Http\Controllers\User\Marketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

use App\Models\User;

use Session;

class MarketplaceAccountController extends Controller
{
    public function index()
    {
        $account = User::where('id', Auth::user()->id)->firstOrFail();

        return view('User.Page.Marketplace.Page.Account.Account', compact('account', ));
    }

    public function show($id)
    {
        if(Session::has('user')){
            $account = User::where('id', Auth::user()->id)->firstOrFail();

            $provinces = Province::pluck('name', 'code');

            return view('User.Page.Marketplace.Page.Account.Create', compact('account', 'provinces'));
        }
        else{
            return redirect()->route('marketplace.index')->with(['success' => 'Silahkan Login Terlebih Dahulu']);
        }
    }

    public function update(Request $request)
    {
                $request->validate([
                    'nama'          => 'required',
                    'email'         => 'required',
                    'telepon'       => 'required',
                    'alamat'        => 'required',
                    
                ]);

                $request->validate([
                    'foto' => 'mimes:jpg,jpeg,png',
                ]);

                $user_id = Auth::user()->id;
                $account = User::findOrFail($user_id);

                if ($files = $request->file('foto')) {
                    $destinationPath = 'datauser/';
                    $file = $request->file('foto');
                    // upload path  
        
                    $profileImage = basename($request->file('foto')->getClientOriginalName(), '.' . $request->file('foto')->getClientOriginalExtension()) . "." .
                        $files->getClientOriginalExtension();
                    $pathImg = $file->storeAs('', $profileImage);
                    $files->move($destinationPath, $profileImage);
                    $account->foto = $pathImg;
                }

                $account->name          = $request->nama;
                $account->alamat        = $request->alamat;
                $account->telepon       = $request->telepon;
                $account->email         = $request->email;
                $account->save();

                return redirect(route('account.index'));
             
    }

    public function create(Request $request)
    {
        if(Session::has('user')){
            $user_id = Auth::user()->id;
            $account = User::findOrFail($user_id);
            $request->validate([
                'provinsi'          => 'required',
                'kota'         => 'required',
                'kecamatan'       => 'required',
                'desa'        => 'required',
                
            ]);

            $prov = Province::where('code', $request->provinsi)->value('name');
            $kot = City::where('code', $request->kota)->value('name');
            $kec = District::where('code', $request->kecamatan)->value('name');
            $des = Village::where('code', $request->desa)->value('name');

            $account->provinsi       =$prov;
            $account->kotakab        = $kot;
            $account->kecamatan       = $kec;
            $account->desa         = $des;
            $account->save();


            return redirect(route('account.index'));

        }
        else{
            return redirect()->route('marketplace.index')->with(['success' => 'Silahkan Login Terlebih Dahulu']);
        }

    }

}
