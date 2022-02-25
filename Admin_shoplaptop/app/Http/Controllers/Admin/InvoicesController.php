<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoicesController extends Controller
{
    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }
    public function index()
    {

        $invoices = $this->invoice->latest()->paginate(5);
        return  view('Admin.invoices.index', compact('invoices'));
    }
    public function create()
    {
        return  view('Admin.invoices.create');
    }
    public function store(Request $request)
    {

        $this->invoice->create(
            [
                'user_id' => Auth::user()->id,
                'adressship' => $request->adressship,
                'phoneship' => $request->phoneship,
                'dateship' => $request->dateship,
                'moneyship' => $request->moneyship,
            ]
        );
        return redirect(route('invoices.index'));
    }

    public function see_deltail($id)
    {
        $invoice = $this->invoice->find($id);

        return view('Admin.invoices.index_detail', compact('invoice'));
    }
    public function edit(Request $request, $id)
    {
        $invoice = $this->invoice->find($id);
        return view('Admin.invoices.edit', compact('invoice'));
    }
    public function update_status(Request $request)
    {
        $this->invoice->upadate(
            [
                'status' => $request->status,
            ]
        );
        return redirect(route('invoices.index'));
    }
    public function delete($id)
    {
        $product = $this->invoice->find($id)->delete();
        return redirect(route('invoice.index'));
    }
}
