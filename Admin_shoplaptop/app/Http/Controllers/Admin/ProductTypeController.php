<?php

namespace App\Http\Controllers\Admin;

use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductType;
use App\component\Recute;

class ProductTypeController extends Controller
{
    private $product_types;

    public function __construct(ProductType $product_types)
    {
        $this->product_types = $product_types;
    }

    public function getproducttype($parent_id)
    {
        $data = $this->product_types->all();
        $recusive = new Recute($data);
        $htmlOption = $recusive->returnproducttype($parent_id);
        return $htmlOption;
    }
    public function create($parent_id = '')
    {
        $htmlOption = $this->getproducttype($parent_id);
        return (view('Admin.product_types.create', compact('htmlOption'), [
            'title' => 'add producttype'
        ]));
    }
    public function store(Request $request)
    {

        $this->product_types->create(
            [
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => $request->name
            ]
        );
        return redirect(route('product_types.index'));
    }

    public function index()
    {
        $product_types = $this->product_types->latest()->paginate(5);
        return (view('Admin.product_types.index', compact('product_types'), [
            'title' => 'add producttype'
        ]));
    }

    public function edit($id)
    {
        $product_type = $this->product_types->find($id);
        $htmlOption = $this->getproducttype($product_type->parent_id);
        return (view('Admin.product_types.edit', compact('product_type', 'htmlOption'), [
            'title' => 'edit producttype'
        ]));
    }
    public function update($id, Request $request)
    {
        $this->product_types->find($id)->update(
            [
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => $request->name
            ]
        );
        return redirect(route('product_types.index'));
    }
    public function delete($id)
    {
        $this->product_types->find($id)->delete();
        return redirect(route('product_types.index'));
    }
}
