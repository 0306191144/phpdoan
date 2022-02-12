<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;

class LoginController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        if (Auth::check()) {
            return redirect()->to(path: 'home');
        }
        return (view('Admin.Login.login
        ', [
            'title' => 'đăng nhập hệ thống'
        ]));
    }

    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($login, $request->remember)) {
            return   redirect()->route('Admin.home');
        } else {
            $request->session()->flash(key: 'error', value: 'email or pass do not have');
            return  redirect()->back();
        }
    }
}
