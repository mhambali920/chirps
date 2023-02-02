<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LazTrx extends Model
{
    use HasFactory;

    protected $table = 'laz_trxes';
    protected $fillable = [
        'user_id',
        'transaction_date',
        'transaction_type',
        'fee_name',
        'details',
        'seller_sku',
        'lazada_sku',
        'amount',
        'order_no',
        'order_item_no'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
