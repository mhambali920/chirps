<?php

namespace App\Imports;

use App\Models\LazTrx;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concern\WithHeadingRow;
use Maatwebsite\Excel\Concern\WithBatchInserts;
// use Maatwebsite\Excel\Imports\HeadingRowFormatter;


class LazTrxImport implements ToModel, WithHeadingRow, WithBatchInserts
{
    // HeadingRowFormatter::default('none');

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new LazTrx([
            'user_id' => Auth::id(),
            'transaction_date' => $row['transaction_date'],
            'transaction_type' => $row['transaction_type'],
            'fee_name' => $row['fee_name'],
            'details' => $row['details'],
            'seller_sku' => $row['seller_sku'],
            'lazada_sku' => $row['lazada_sku'],
            'amount' => $row['amount'],
            'order_no' => $row['order_no'],
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
