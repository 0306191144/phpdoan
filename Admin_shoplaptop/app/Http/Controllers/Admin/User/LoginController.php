<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;

use function PHPUnit\Framework\isEmpty;

class LoginController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        return (view('Admin.Login.login
        ', [
            'title' => 'đăng nhập hệ thống'
        ]));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (Auth::attempt([
            "email" => $request->email,
            "password" => $request->password,
        ])) {
            $user = Auth::user();
            if ($user->isadmin == 1) {
                Cookie::queue(Cookie::make('user', $user, 600));
                return redirect()->route('products.index');
            }
        } else {
            $request->session()->flash(key: 'error', value: 'email or pass do not have');
            return  redirect()->route('login');
        }

        // $user = User::query()->where('email', $request->email)->first();
        // if ($user) {
        //     if ($user->password == $request->password) {
        //         Auth::attempt([
        //             "email" => $request->email,
        //             "password" => $request->password,
        //         ]);


        //         Cookie::queue(Cookie::make('user', $user, 60));
        //         return  redirect()->route('Admin.Home');
        //     }
        // }
        // $request->session()->flash(key: 'error', value: 'email or pass do not have');
        // return  redirect()->route('login');
    }

    public function logout()
    {
        Cookie::queue(Cookie::forget('user'));
        Auth::logout();
        return  redirect()->route('login');
    }
}
