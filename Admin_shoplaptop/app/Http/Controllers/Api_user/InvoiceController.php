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

        $invoice_create = $this->invoice->create(
            [
                // 'user_id' => Auth::user()->id,
                'user_id' => 3,
                'status' => 1,
                'nameship' => $request->nameship,
                'adressship' => $request->addressship,
                'phoneship' => $request->phoneship,
                'moneyship' => $request->moneyship,
            ]
        );
        $cart = $this->cart->Where('user_id', '==', 3); // Auth::user()->id);
        $totail = 0;
        foreach ($cart as $sp) {
            $this->invoice_deltail->create([
                'invoice_id' => $invoice_create->id,
                'product_id' => $sp->product_id,
                'quantity' => $sp->quantity,
                'price' => $sp->product->price,
            ]);

            $totail = $totail + $sp->quantity * $sp->Product->price;
            $sp->delete();
        }
        $totail = $totail + $request->moneyship;

        $invoice_create['totail'] = $this->invoice->create(['totail' => $totail]);

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
