<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, foreignKey: 'product_id',);
    }
    public function User()
    {
        return $this->belongsTo(User::class, foreignKey: 'user_id');
    }
}
