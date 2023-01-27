<?php

namespace App\Http\Controllers;

use App\Models\LazTrx;
use App\Imports\LazTrxImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class LazTrxController extends Controller
{
    public function import(Request $request)
    {
        Excel::import(new LazTrxImport, $request->file('excel'));
    }
}
