<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;



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
                return redirect()->route('products.index');
            } else {
                return  redirect()->route('login');
            }
        } else {
            $request->session()->flash(key: 'error', value: 'email or pass do not have');
            return  redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return  redirect()->route('login');
    }
}
