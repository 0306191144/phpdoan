<?php

namespace App\Http\Controllers\Admin;


use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\ProductImage;
use App\Models\Product;

use App\component\Recute;
use App\Traits\StorageImage;

use Illuminate\Support\Facades\Auth;



class ProductController extends Controller
{
    use   StorageImage;


    public function __construct(ProductType $product_types, Product $product,  ProductImage $productimage)
    {
        $this->product_types = $product_types;
        $this->product = $product;
        $this->productimage = $productimage;
    }

    public function index()
    {
        $productnew = $this->product->latest()->paginate(5);
        return (view('Admin.products.index', compact('productnew'), [
            'title' => 'add product'
        ]));
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
        return (view('Admin.products.create', compact('htmlOption'), [
            'title' => 'add product'
        ]));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'product_type_id' => 'required',


        ]);
        try {

            $dataproduct =
                [
                    'name' => $request->name,
                    'price' => $request->price,
                    'cpu' => $request->cpu,
                    'ram' => $request->ram,
                    'screen' => $request->screen,
                    'product_type_id' => $request->product_type_id,
                    'discription' => $request->discription,
                ];
            $datauploadfile = $this->StroageImgupload($request, fileName: 'image', Path: 'product');
            if (!empty($datauploadfile)) {
                $dataproduct['img_path'] = $datauploadfile['path'];
                $dataproduct['image_name'] = $datauploadfile['name'];
            }
            $dataproducts =  $this->product->create($dataproduct);

            if ($request->hasFile('img_path')) {
                foreach ($request->img_path as $Imgitem) {
                    $datauploadfilemuti = $this->StroageImguploadMuti(file: $Imgitem, Path: 'product');
                    $datatableimg = [
                        'product_id' => $dataproducts->id,
                        'name_image' =>  $datauploadfilemuti['name'],
                        'img_path' =>  $datauploadfilemuti['path']
                    ];
                    $dataproducts->productImg()->create($datatableimg);
                }
            }
            return redirect()->route('products.index');
        } catch (\Exception $e) {
        }
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getproducttype($product->product_type_id);
        return (view('Admin.products.edit', compact('product', 'htmlOption'), [
            'title' => 'edit producttype'
        ]));
    }
    public function update($id, Request $request)
    {
        try {
            $dataproduct =
                [
                    'name' => $request->name,
                    'price' => $request->price,
                    'cpu' => $request->cpu,
                    'ram' => $request->ram,
                    'screen' => $request->screen,
                    'product_type_id' => $request->product_type_id,
                    'discription' => $request->discription,
                ];

            $datauploadfile = $this->StroageImgupload($request, fileName: 'image', Path: 'product');
            if (!empty($datauploadfile)) {
                $dataproduct['img_path'] = $datauploadfile['path'];
                $dataproduct['image_name'] = $datauploadfile['name'];
            }

            $this->product->find($id)->update($dataproduct);
            $dataproducts = $this->product->find($id);

            if ($request->hasFile(key: 'img_path')) {
                $this->productimage->where('Product_id', $id)->delete();
                foreach ($request->img_path as $Imgitem) {
                    $datauploadfilemuti = $this->StroageImguploadMuti(file: $Imgitem, Path: 'product');
                    $datatableimg = [
                        'product_id' => $id,
                        'name_image' =>  $datauploadfilemuti['name'],
                        'img_path' =>  $datauploadfilemuti['path']
                    ];
                    $dataproducts->productImg()->create($datatableimg);
                }
            }

            return redirect()->route('products.index');
        } catch (\Exception $e) {
        }
    }
    public function delete($id)
    {
        $product = $this->product->find($id)->delete();
        return redirect(route('products.index'));
    }
}
