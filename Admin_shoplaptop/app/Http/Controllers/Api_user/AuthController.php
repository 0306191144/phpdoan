<?php

namespace App\Http\Controllers\Api_user;

use Illuminate\Http\Request;
use App\Http\Controllers\Api_user\BaseController as BaseController;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors()->first());
        }
        $input = $request->all();
        $user = User::where('email', $input['email'])->first();
        if (!$user || $input['password'] != $user->password) {
            return $this->sendError('Sai email hoặc mật khẩu', 401);
        }
        if (Auth::guard('web')->attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::guard('web')->user();
        }

        return $this->sendResponse(
            $user,
            'login success'
        );
    }


    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:6|max:35',
            'email' => 'required|string|unique:users,email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors()->first());
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $user = User::where('email', $input['email']);
        return $this->sendResponse($user, 'success register');
    }
}
