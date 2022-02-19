<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_deltail extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'product_id',
        'quantity',
        'price',
        'totail',
    ];

    public function Invoice()
    {
        return $this->belongsTo(Order::class);
    }

    public function product_ivd()
    {
        return $this->belongsTo(Product::class, foreignKey: 'product_id');
    }
}
