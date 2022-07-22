<?php

namespace App\Http\Controllers\Nelayan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminLoginVerifyRequest;
use Illuminate\Http\Request;

use App\Models\Nelayan;
use Session;

class NelayanLoginController extends Controller
{
    public function loginnelayan()
    {
            return view('Nelayan.Auth.Login');
    }

    public function proses_loginnelayan(request $request)
    {
        $email      = request('email');
        $password   = request('password');

        $nelayan = Nelayan::where('email', $email)->first();
        
        if($nelayan==null)
        {
            $request->session()->flash('error', 'Invalid Username');
            
            return redirect(route('loginnelayan'));
        }
        
        else
        {
            if($password == $nelayan -> password)
            {
                if($nelayan->status == 'Non Aktif')
                {
                    return redirect(route('loginnelayan'))->with('success', 'Gagal Login Account Anda Masih Tahap Verifikasi Admin');
                }
                else
                {
                    session()->put('nelayan',$nelayan);
                    //$request->session()->put('username', $request->Username);
                    return redirect(route('dashboardnelayan.index'));
                }
            }
            else if($request->password!=$nelayan->password)
            {
                return view('Nelayan.Auth.Login')->with(['success' => 'Invalid Password']);
            }
        }
    }

    public function logoutnelayan(Request $request)
    {
        $user = session()->get('nelayan')->id;
        $request->session()->forget('nelayan', $user);
        return Redirect('loginnelayan');
    }
}
