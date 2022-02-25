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
    public function addToCart($id)
    {
        $addcart = $this->cart->create([
            'user_id' => Auth::user()->id,
            'product_id' => $id,
            'quantity' => 110,
        ]);
        return $this->sendResponse($addcart, 'ADD product to cart');
    }

    public function getCartByUser()
    {
        $carts = Auth::user()->carts;
        if ($carts == null) {
            $this->sendResponse($carts, ' giỏ hàng trống');
        }
        return $this->sendResponse($carts, 'Lấy giỏ hàng thành công.');
    }
    public function updateCart(Request $request)
    {
        $this->cart::update($request->quantity);
        $cart = Auth::user()->carts;
        return $this->sendResponse($cart, 'update hàng thành công.');
    }
    public function removeCart($id)
    {
        $cart = Cart::remove($id);
        return $this->sendResponse($cart, 'xoá thành công');
    }
}
