<?php

namespace App\Http\Controllers\Api_user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listproduct()
    {
        $product =  Product::all();
    }
    public function product_price()
    {
    }
    public function product_caterory()
    {
    }
}
