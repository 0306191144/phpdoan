<?php

namespace App\Http\Controllers\Api_user;

use App\Models\Cart;
use App\Models\Invoice;
use App\Models\Invoice_deltail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api_user\BaseController as BaseController;

class InvoiceController extends BaseController
{
    public function __construct(
        Cart $cart,
        Product $product,
        Invoice $invoice,
        Invoice_deltail $invoice_deltail
    ) {
        $this->cart = $cart;
        $this->product = $product;
        $this->invoice_deltail = $invoice_deltail;
        $this->invoice = $invoice;
    }

    public function payment(Request $request)
    {

        $this->invoice->create(
            [

                'user_id' => Auth::user()->id,
                'status' => 1,
                'nameship' => $request->nameship,
                'adressship' => $request->adressship,
                'phoneship' => $request->phoneship,
                'moneyship' => 30000,
                'totail' => $request->totail
            ]
        );
        $cart = Auth::user()->carts;
        foreach ($cart as $sp) {
            $Data['invoice_id'] = $sp->id;
            $Data['product_id'] = $sp->product_id;
            $Data['quantity'] = $sp->quantity;
            $Data['price'] = $sp->product->price;
            $invoice_create =  Invoice_deltail::create($Data);
            $sp->delete();
        }
        return $this->sendResponse($invoice_create, 'Lấy danh sách đơn hàng thành công.');
    }


    public function get_list_invoice()
    {

        $orders = Invoice::query()->where('user_id', '=', Auth::user()->id)->get();

        foreach ($orders as $key => $value) {
            $value['statusis'] = $value->statusis;
        }
        return $this->sendResponse($orders, 'Lấy danh sách đơn hàng thành công.');
    }

    public function get_status_invoice($id)
    {
        $orders = Invoice::query()->where('user_id', Auth::user()->id)->where('status', '=', $id)->get();
        foreach ($orders as $key => $value) {
            $value['statusis'] = $value->statusis;
        }
        return $this->sendResponse($orders, 'Lấy danh sách đơn hàng thành công.');
    }


    public function update_status(Request $request, $id)
    {

        Invoice::find($id)->update(['status' => $request->status]);
        $orders = $this->invoice->find($id);
        return $this->sendResponse($orders, 'Lấy danh sách đơn hàng thành công.');
    }



    public function delete($id)
    {
        $orders =  Invoice::find($id)->delete();
        return $this->sendResponse($orders, 'Lấy danh sách đơn hàng thành công.');
    }
}
