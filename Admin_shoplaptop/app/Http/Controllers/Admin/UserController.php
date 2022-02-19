<?php

namespace App\Http\Controllers\Admin;

use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use App\Models\ProductTag;
use App\Traits\StorageImage;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr;
use PhpParser\Node\Stmt\Return_;
use Storage;

class UserController extends Controller
{
    use   StorageImage;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index()
    {

        $usersv = $this->user->latest()->paginate(5);
        return (view('Admin.users.index', compact('usersv'), [
            'title' => 'add product'
        ]));
    }
    public function create()
    {
        return (view('Admin.users.create', [
            'title' => 'add user'
        ]));
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'adress' => 'required',
            'gender' => 'required',
            'email' => 'required|string|unique:users,email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        try {
            $dataupdates = [
                'name' => $request->name,
                'phone' => $request->phone,
                'adress' => $request->adress,
                'gender' => $request->gender,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ];
            if ($request->isadmin == true) {
                $dataupdate['isadmin'] = ['1'];
            } else
                $dataupdate['isadmin'] = ['0'];

            $datauploadfile = $this->StroageImgupload($request, fileName: 'avatar', Path: 'user');
            if (!empty($datauploadfile)) {
                $dataupdates['avatar_path'] = $datauploadfile['path'];
                $dataupdates['avatar'] = $datauploadfile['name'];
            }
            $this->user->create($dataupdates);
            return redirect()->route('users.index');
        } catch (\Exception $e) {
        }
    }



    public function edit($id)
    {
        $user = $this->user->find($id);
        return (view('Admin.users.edit', compact('user'), [
            'title' => 'add user'
        ]));
    }


    public function update($id, Request $request)
    {
        try {

            $dataupdate = [
                'name' => $request->name,
                'phone' => $request->phone,
                'adress' => $request->adress,
                'gender' => $request->gender,
                'email' => $request->email,
                'password' => $request->password,
            ];
            if ($request->isadmin == true) {
                $dataupdate['isadmin'] = ['1'];
            } else
                $dataupdate['isadmin'] = ['0'];

            $datauploadfile = $this->StroageImgupload($request, fileName: 'avatar', Path: 'user');
            if (!empty($datauploadfile)) {
                $dataupdate['avatar_path'] = $datauploadfile['path'];
                $dataupdate['avatar'] = $datauploadfile['name'];
            }
            $this->user->find($id)->update($dataupdate);
            return redirect()->route('users.index');
        } catch (\Exception $e) {
        }
    }
    public function delete($id)
    {
        $this->user->find($id)->delete();
        return redirect(route('users.index'));
    }
}
