<?php

namespace App\Http\Controllers;

use App\Models\TransactionCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TransactionCategoryController extends Controller
{
    public function index()
    {
        return Inertia::render('Transactions/Categories/Index', ['categories' => TransactionCategory::all()]);
    }

    public function store(Request $request)
    {
        if ($request->user()->role !== 'ADMIN') {
            abort(403, 'Hanya Admin Yang Di Izinkan');
        }
        $request->validate([
            'name' => 'required',
            'type' => 'required|in:income,expense',
            'description' => 'required',
            'cashless' => 'required|integer|in:1,0',
            'icon' => 'required|string',
            'icon_color' => 'required|string',
        ]);
        TransactionCategory::updateOrCreate(
            ['id' => $request->input('id')],
            [
                'name' => $request->input('name'),
                'type' => $request->input('type'),
                'description' => $request->input('description'),
                'cashless' => $request->input('cashless'),
                'icon' => $request->input('icon'),
                'icon_color' => $request->input('icon_color'),
            ]
        );
        return redirect()->route('extracker.categories.index');
    }

    public function destroy($id)
    {
        if (auth()->user()->role !== 'ADMIN') {
            abort(403, 'Hanya Admin Yang Di Izinkan');
        }
        TransactionCategory::destroy($id);
        return redirect()->route('extracker.categories.index');
    }
}
