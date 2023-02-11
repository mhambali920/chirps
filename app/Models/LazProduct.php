<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LazProduct extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_name', 'base_price', 'lazada_sku'];

    public function laztrxs()
    {
        return $this->hasMany(LazTrx::class, 'lazada_sku', 'lazada_sku');
    }
}
