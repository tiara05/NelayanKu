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

class NelayanAccountController extends Controller
{
    public function index()
    {
        if(Session::has('nelayan')){

            $provinces = Province::pluck('name', 'code');

            $account = Nelayan::where('id', session()->get('nelayan')->id)->firstOrFail();

            return view('Nelayan.Page.DataAccount.DataAccount',['provinces' => $provinces], compact('account', ));
        }
        else{
            return redirect()->route('loginnelayan');
        }
    }

    public function update(Request $request)
    {
        if(Session::has('nelayan')){
                $request->validate([
                    'nama'          => 'required',
                    'email'         => 'required',
                    'telepon'       => 'required',
                    'alamat'        => 'required',
                    
                ]);

                $user_id = session()->get('nelayan')->id;
                $account = Nelayan::findOrFail($user_id);

                $account->name          = $request->nama;
                $account->alamat        = $request->alamat;
                $account->nomortelepon  = $request->telepon;
                $account->email         = $request->email;
                $account->save();

                return redirect(route('accountnelayan.index'));
            
        }
        else{
            return redirect()->route('loginnelayan');
        }    
    }
}
