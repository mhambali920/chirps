<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(TransactionCategory::class, 'category_id', 'id');
    }

    public function Installments()
    {
        return $this->hasMany(Installment::class);
    }

    public static function getTotal($type, $paymentType, $month, $year)
    {
        return self::whereHas('category', function ($q) use ($type) {
            $q->where('type', $type);
        })
            ->where('user_id', Auth::id())
            ->where('payment_type', '=', $paymentType)
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->sum('amount');
    }
}
