<?php

namespace App\Http\Controllers\Admin\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            return redirect()->to(path:'home');
        }
        return(view('Admin.Login.login
        ',[
            'title'=> 'đăng nhập hệ thống'
        ]));
    }
    
}
