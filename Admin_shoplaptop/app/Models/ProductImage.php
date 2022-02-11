<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'img_path',
        'name_image',
        'product_id'
    ];
    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
