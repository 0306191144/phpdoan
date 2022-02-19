<?php

namespace App\Http\Controllers\Api_user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Invoice;
use App\Models\Invoice_deltail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
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
                'user_id' => Auth::user()->id,
                'status' => 1,
                'nameship' => $request->nameship,
                'adressship' => $request->addressship,
                'phoneship' => $request->phoneship,
                'moneyship' => $request->moneyship,
            ]
        );
        $cart = $this->cart->Where('id', Auth::user()->id);
        $totail = 0;
        foreach ($cart as $sp) {
            $this->invoice_deltail->create([
                'invoice_id' => $invoice_create->id,
                'product_id' => $sp->product_id,
                'quantity' => $sp->quantity,
                'price' => $sp->product->price,
            ]);
            $totail = $totail + $sp->quantity * $sp->Product->price;
        }
        $totail = $totail + $request->moneyship;
        $this->invoice->create(['totail' => $totail]);
    }

    public function updatestaus(Request $request, $id)
    {
        $this->invoices->find($id)->update(['status' => $request->status]);
    }
    public function delete($id)
    {
        $this->invoices->find($id)->delete();
    }
}
