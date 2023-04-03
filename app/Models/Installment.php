<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function Transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
