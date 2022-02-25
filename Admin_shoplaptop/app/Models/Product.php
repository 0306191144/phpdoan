<?php

namespace App\Models;

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'price',
        'cpu',
        'ram',
        'screen',
        'product_type_id',
        'discription',
        'image_name',
        'img_path'
    ];
    public function productImg()
    {
        return $this->hasMany(ProductImage::class, foreignKey: 'product_id');
    }

    public function producttype()
    {
        return $this->belongsTo(ProductType::class, foreignKey: 'product_type_id');
    }
}
