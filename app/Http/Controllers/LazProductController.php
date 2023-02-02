<?php

namespace App\Http\Controllers;

use App\Models\LazProduct;
use Illuminate\Http\Request;

class LazProductController extends Controller
{
    public function editPrice(Request $request)
    {
        $request->validate([
            'base_price' => 'integer'
        ]);
        LazProduct::updateOrcreate(
            ['lazada_sku' => $request->lazada_sku],
            [
                'user_id' => auth()->id(),
                'product_name' => $request->product_name,
                'base_price' => $request->base_price,
            ]
        );
        return to_route('laztrx.edit');
    }
}
