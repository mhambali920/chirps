<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\LazTrx;
use Illuminate\Http\Request;
use App\Imports\LazTrxImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class LazTrxController extends Controller
{
    public function index()
    {
        $data = [];
        $data['transaction_details'] = LazTrx::where('user_id', Auth::id())->selectRaw('fee_name, SUM(amount) AS amount')->groupBy('fee_name')->get();
        $data['trxs'] = LazTrx::where(['user_id' => Auth::id()])
            ->selectRaw("
            (select count(distinct order_no) from laz_trxes where fee_name = 'Item Price Credit' and user_id = " . Auth::id() . ") as total_orders,
            (select count(distinct order_item_no ) from laz_trxes where fee_name = 'Item Price Credit' and user_id = " . Auth::id() . ") as total_products_orders, 
            (select sum(base_price) from laz_trxes join laz_products on laz_trxes.lazada_sku = laz_products.lazada_sku where fee_name = 'Item Price Credit' and laz_trxes.user_id = " . Auth::id() . ") as total_base_price,
            sum(amount) as total_payment,
            min(transaction_date) as min_date,
            max(transaction_date) as max_date
            ")
            ->first();
        return Inertia::render('Laz/Index', $data);
    }

    public function import(Request $request)
    {
        $request->validate([
            'uploadFile' => 'required|mimes:csv,txt|max:6144',
        ]);
        LazTrx::where('user_id', Auth::id())->delete();
        Excel::import(new LazTrxImport, $request->file('uploadFile'));
        return redirect(route('laztrx.edit'));
    }

    public function edit()
    {
        $data = [];
        $data['trxs'] = LazTrx::selectRaw('laz_trxes.id, details, seller_sku, laz_trxes.lazada_sku, base_price, COUNT(details) AS total')
            ->leftJoin(DB::raw("(SELECT * FROM laz_products WHERE laz_products.user_id = " . Auth::id() . ") AS lp"), 'laz_trxes.lazada_sku', '=', 'lp.lazada_sku')
            ->where('fee_name', 'Item Price Credit')
            ->where('laz_trxes.user_id', Auth::id())
            ->groupBy('laz_trxes.lazada_sku')
            ->orderByRaw('total DESC, details ASC')
            ->get();
        return Inertia::render('Laz/Edit', $data);
    }

    public function destroy()
    {
        LazTrx::where('user_id', Auth::id())->delete();
        return redirect(route('laztrx.index'));
    }

    public function feeName($feename)
    {
        $data = [];
        $data['fee_name'] = $feename;
        $data['trxs'] = LazTrx::with('lazproduct')
            ->where(['user_id' => Auth::id(), 'fee_name' => $feename])
            ->paginate(20);
        return Inertia::render('Laz/FeeName', $data);
    }
}
