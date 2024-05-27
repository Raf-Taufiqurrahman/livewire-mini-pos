<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    /**
     * fillable
     */
    protected $fillable = ['transaction_id', 'product_id', 'qty', 'price'];

    /**
     * relation transaction
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    /**
     * relation product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
