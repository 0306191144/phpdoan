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

    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::query()->where('email', $request->email)->first();

        if ($user) {
            if ($user->password == $request->password) {
                Cookie::queue(Cookie::make('user', $user, 60));
                return  redirect()->route('users.index');
            }
        }
        $request->session()->flash(key: 'error', value: 'email or pass do not have');
        return  redirect()->back();

        // if (Auth::attempt($login, $request->remember)) {
        //     return  redirect()->route('users.index');
        // } else {
        // }
    }

    public function logout()
    {
        Cookie::queue(Cookie::forget('user'));
        return redirect()->back();
    }
}
