<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transactionDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'products_id', 'transaction_id'
    ];

    public function transaction()
    {
        return $this->belongsTo(transaction::class, 'transaction_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(product::class, 'products_id', 'id');
    }
}
