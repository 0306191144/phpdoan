<?php

namespace App\Http\Controllers\Api_user;

use Illuminate\Http\Request;
use App\Http\Controllers\Api_user\BaseController as BaseController;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

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
        if (Auth::attempt([
            "email" => $request->email,
            "password" => $request->password,
        ])) {
            $user = Auth::user();
            $token = $user->createToken('MyAuthApp')->plainTextToken;
            $data = [
                'user' => $user,
                'token' => $token
            ];
            return $this->sendResponse(
                $data,
                'login success'
            );
        } else {
            return $this->sendError('Wrong email or password', 401);
        }
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
