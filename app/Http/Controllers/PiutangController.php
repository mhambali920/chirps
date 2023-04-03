<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Installment;
use App\Models\Transaction;
use App\Models\TransactionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\map;

class PiutangController extends Controller
{
    public function index(Request $request)
    {
        $utang = Transaction::with(['category', 'installments'])->whereHas('category', function ($query) {
            $query->where('type', '=', 'expense');
        })
            ->where('payment_type', '=', 'noncash')
            ->where('user_id', '=', Auth::id())
            ->get()
            ->map(function ($row) {
                return [
                    'id' => $row->id,
                    'date' => $row->date,
                    'amount' => $row->amount,
                    'contact_name' => $row->contact_name,
                    'due_date' => $row->due_date,
                    'category_name' => $row->category->name,
                    'paid' => $row->installments->sum('amount'),
                    'installments' => $row->installments,
                ];
            });
        $piutang = Transaction::with(['category', 'installments'])->whereHas('category', function ($query) {
            $query->where('type', '=', 'income');
        })
            ->where('payment_type', '=', 'noncash')
            ->where('user_id', '=', Auth::id())
            ->get()
            ->map(function ($row) {
                return [
                    'id' => $row->id,
                    'date' => $row->date,
                    'amount' => $row->amount,
                    'contact_name' => $row->contact_name,
                    'due_date' => $row->due_date,
                    'category_name' => $row->category->name,
                    'accepted' => $row->installments->sum('amount'),
                    'installments' => $row->installments,
                ];
            });

        $total_utang = $utang->sum('amount');
        $total_piutang = $piutang->sum('amount') - $piutang->sum('accepted');
        // dd([$piutang, $utang, $total_piutang, $total_utang]);
        return Inertia::render('Transactions/Piutang/Index', [
            'utang' => $utang,
            'piutang' => $piutang,
            'total_utang' => $total_utang,
            'total_piutang' => $total_piutang
        ]);
    }

    public function accept(Request $request)
    {
        $transaction = Transaction::findOrFail($request->trx_id);
        $installment = new Installment;
        $remaining_debt = $transaction->amount - $installment->sum('amount');
        $request->validate([
            'trx_id' => ['integer', 'required'],
            'date' => ['required', 'date'],
            'amount' => ['required', 'integer', 'max:' . $remaining_debt]
        ]);
        if ($transaction) {
            // simpan data cicilan
            $installment->transaction_id = $request->trx_id;
            $installment->amount = $request->amount;
            $installment->date = $request->date;
            $installment->remaining_debt = $remaining_debt - $request->amount;
            $installment->save();

            // buat data transaksi baru berdasarkan cicilan
            $category = TransactionCategory::where('name', '=', 'Penerimaan Piutang')->first();
            $newTransaction = new Transaction;
            $newTransaction->user_id = Auth::id();
            $newTransaction->category_id = $category->id;
            $newTransaction->amount = $request->amount;
            $newTransaction->date = $request->date;
            $newTransaction->description = '( ' . $transaction->category->name .  ' ) - ' . $transaction->description;
            $newTransaction->payment_type = 'cash';
            $newTransaction->contact_name = $transaction->contact_name;
            $newTransaction->save();
        }

        // redirect
        return  redirect()->route('extracker.transactions.index');
    }
    public function pay(Request $request)
    {
        $transaction = Transaction::findOrFail($request->trx_id);
        $installment = new Installment;
        $remaining_debt = $transaction->amount - $installment->sum('amount');
        $request->validate([
            'trx_id' => ['integer', 'required'],
            'date' => ['required', 'date'],
            'amount' => ['required', 'integer', 'max:' . $remaining_debt]
        ]);
        if ($transaction) {
            // simpan data cicilan
            $installment->transaction_id = $request->trx_id;
            $installment->amount = $request->amount;
            $installment->date = $request->date;
            $installment->remaining_debt = $remaining_debt - $request->amount;
            $installment->save();

            // buat data transaksi baru berdasarkan cicilan
            $category = TransactionCategory::where('name', '=', 'Penerimaan Piutang')->first();
            $newTransaction = new Transaction;
            $newTransaction->user_id = Auth::id();
            $newTransaction->category_id = $category->id;
            $newTransaction->amount = $request->amount;
            $newTransaction->date = $request->date;
            $newTransaction->description = '( ' . $transaction->category->name .  ' ) - ' . $transaction->description;
            $newTransaction->payment_type = 'cash';
            $newTransaction->contact_name = $transaction->contact_name;
            $newTransaction->save();
        }

        // redirect
        return  redirect()->route('extracker.transactions.index');
    }
}
