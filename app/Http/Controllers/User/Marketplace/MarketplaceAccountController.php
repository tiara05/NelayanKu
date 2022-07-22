<?php

namespace App\Http\Controllers\User\Marketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;


use Session;

class MarketplaceAccountController extends Controller
{
    public function index()
    {

        $account = User::where('id', Auth::user()->id)->firstOrFail();

        return view('User.Page.Marketplace.Page.Account.Account', compact('account', ));
        
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

}
