<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postLogin(Request $request)
    {
        $data = $request->all();

        //dd($data);
        $user = User::where('account', $data['account'])->first();
        if (!$user) {
            return back();
        }

        if ($user->role == 1) {
            $credentials = User::where('account', $data['account'])
                ->where('password', $data['password'])
                ->first();
            if ($credentials && $credentials->email_verified_at != null) {
                Auth::login($credentials);
                $user = Auth::user();
//                if ($user->user_info) {
//                    return redirect('groups');
//                } else {
//                    return redirect('teachers/create');
//                }
            } else {
                return back();
            }
        } elseif ($user->role == 99) {
            //$credentials = $request->only('account', 'password');
            //if(Auth::attempt($credentials)){
            $credentials = User::where('account', $data['account'])
                ->where('password', $data['password'])
                ->first();
            if ($credentials) {
                Auth::login($credentials);
                //return redirect('groups');
                return back();
            } else {
                return back();
            }
        } else {
            $credentials = $request->only('account', 'password');
            if (Auth::attempt($credentials)) {
                //return redirect('groups');
                return back();
            } else {
                return back();
            }
        }

        return back();
        //return redirect('groups');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
