<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Installment;
use App\Models\TransactionCategory;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class TransactionController extends Controller
{

    public function index(Request $request)
    {
        $transactions = Transaction::with('category')->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get()->groupBy('date');
        $data = $transactions->map(function ($rows) {
            return [
                'data' => $rows->map(function ($row) {
                    return [
                        'id' => $row->id,
                        'date' => $row->date,
                        'amount' => $row->amount,
                        'description' => $row->description,
                        'category_id' => $row->category->id,
                        'category_icon' => $row->category->icon,
                        'category_color' => $row->category->icon_color,
                        'category_name' => $row->category->name,
                    ];
                })->toArray(),
                'total' => $rows->sum('amount')
            ];
        });
        // dd($data);

        // if ($request->has('date_start') && $request->has('date_end')) {
        //     $transactions->whereBetween('date', [$request->date_start, $request->date_end]);
        // }

        // if ($request->has('type')) {
        //     $transactions->where('type', $request->type);
        // }

        // if ($request->has('customer_id')) {
        //     $transactions->where('customer_id', $request->customer_id);
        // }

        // dd($transactions);

        return Inertia::render('Transactions/Index', ['transactions' => $data, 'categories' => TransactionCategory::all()]);
    }

    public function create()
    {
        return Inertia::render('Transactions/Create', ['categories' => TransactionCategory::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|integer',
            'payment_type' => 'required|in:cash,noncash',
            'customer_id' => 'nullable|exists:customers.id',
            'category_id' => 'required|integer',
            'description' => 'required|string|max:255',
            'due_date' => 'required_if:payment_type,noncash',
        ]);
        $checkCategory = TransactionCategory::where('id', $request->category_id)->first();
        $transaction = Transaction::updateOrCreate(
            ['id' => $request->input('id')],
            [
                'user_id' => Auth::id(),
                'date' => $request->date,
                'amount' => $checkCategory->type == 'expense' ? -$request->amount : $request->amount,
                'payment_type' => $request->payment_type,
                'customer_id' => $request->customer_id,
                'category_id' => $request->category_id,
                'description' => $request->description,
            ]
        );

        // if ($transaction->type == 'noncash') {
        //     $installment = new Installment;
        //     $installment->date = $transaction->date;
        //     $installment->amount = $transaction->amount;
        //     $installment->remaining_debt = $transaction->amount;
        //     $installment->transaction_id = $transaction->id;
        //     $installment->save();
        // }
        return redirect()->route('extracker.transactions.index');
    }

    public function destroy($id)
    {
        $transaction = Transaction::where('user_id', Auth::id())->findOrFail($id);
        $transaction->delete();
        return redirect()->route('extracker.transactions.index');
    }

    public function pay(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|integer',
        ]);
        $transaction = Transaction::findOrFail($id);
        if ($transaction->type == 'noncash') {
            $installment = Installment::where('transaction_id', $transaction->id)
                ->orderBy('date', 'asc')
                ->first();
            if ($request->amount > $installment->remaining_debt) {
                return response()->json([
                    'error' => 'Jumlah pembayaran tidak boleh lebih besar dari sisa hutang',
                ], 422);
            }

            $installment->remaining_debt -= $request->amount;
            $installment->save();

            if ($installment->remaining_debt == 0) {
                $installment->delete();
            }
        }

        return response()->json([
            'message' => 'Pembayaran berhasil dilakukan',
            'transaction' => $transaction,
        ], 200);
    }
}
