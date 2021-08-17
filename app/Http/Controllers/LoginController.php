<?php

namespace App\Http\Controllers;

use App\Mail\Register;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function postLogin(Request $request): RedirectResponse
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
                $current_user = Auth::user();
                \Session::put('admin_user', $current_user);
                return redirect('member');
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
                return redirect('admin');
                //return back();
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

    public function register(Request $request)
    {
        $data = $request->all();

        //Create token
        $token = Str::random(32);

        $mail_data['url'] = url('/verify?account='.$data['account'].'&token='.$token);
        //$mail_data['email'] = $mail_data['account'];
//        Mail::to($mail_data['email'])
//            ->send(new Register($mail_data));


        $data['token'] = $token;
        $data['role'] = 1;
        $user = new User();
        $user->fill($data);
        $user->save();


        return back();
    }

    public function getVerify(Request $request)
    {
        $data = $request->all();
        $user = User::where('account',$data['account'])
            ->where('token',$data['token'])
            ->update(['email_verified_at' => date('Y-m-d H:i:s')]);
        $user = User::where('account',$data['account'])->first();
        Auth::login($user);
        return redirect('groups');
    }
}
