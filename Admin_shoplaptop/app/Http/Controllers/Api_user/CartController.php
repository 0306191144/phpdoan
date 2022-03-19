<?php

namespace App\Http\Controllers\Api_user;

use App\Http\Controllers\Api_user\BaseController  as BaseController;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends BaseController
{

    public function __construct(Cart $cart, Product $product, User $user)
    {
        $this->cart = $cart;
        $this->product = $product;
        $this->user = $user;
    }
    public function addToCart(Request $request)
    {
        $addcart = Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'quantity' => 1,
        ]);
        $addcart['product'] = $addcart->product;
        return $this->sendResponse($addcart, 'ADD product to cart');
    }

    public function getCartByUser()
    {
        $carts = Auth::user()->carts;

        for ($i = 0; $i < Count($carts); $i++) {
            $carts[$i]['product'] = $carts[$i]->product;
        }
        return $this->sendResponse($carts, 'Lấy giỏ hàng thành công.');;
    }




    public function updateCart(Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart->quantity = $request['quantity'];
        $cart->save();
        $cart['product'] = $cart->product;

        return $this->sendResponse($cart, 'Thành công');
    }

    public function removeCart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return $this->sendResponse($cart, 'xoá thành công');
    }
}
