<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status',
        'nameship',
        'totail',
        'adressship',
        'phoneship',
        'moneyship',
    ];

    public function useriv()
    {
        return $this->belongsTo(User::class,  'user_id', 'id');
    }
    public function invoice_detail()
    {
        return $this->hasMany(Invoice_deltail::class, 'invoice_id', 'id');
    }
    public function status()
    {
        return $this->belongsTo(StausInvoice::class, foreignKey: 'status');
    }
}
