<?php

namespace App\Http\Controllers\Api_user;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Api_user\BaseController as BaseController;

class ProductController extends BaseController
{
    public function show(Product $product)
    {
        return $this->sendResponse(
            $product,
            'susecces'
        );
    }
    public function list_product()
    {
        $product = Product::all();
        return $this->sendResponse(
            $product,
            'susecces'
        );
    }

    public function list_product_new()
    {
        $product = Product::orderby('created_at', 'desc')->take(4)->get();

        return $this->sendResponse(
            $product,
            'susecces'
        );
    }
    public function search(Request $request)
    {
        $products = Product::where(function ($query) use ($request) {
            if ($request['product_type_id'] != null) {
                $query->where('product_type_id', '=', $request->product_type_id);
            }
            if ($request['name']) {
                $query->where('name', 'LIKE', "%" . $request->name . "%");
            }
        })->get();
        $response['products'] = $products;
        $response['total'] = $products->count();
        if ($response['total'] > 0) {
            return $this->sendResponse(
                $response,
                'Lay danh sach san pham thanh cong.'
            );
        }
        return $this->sendError('San pham khong ton tai.', 401);
    }
}
