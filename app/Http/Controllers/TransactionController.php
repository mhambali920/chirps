<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionCategory;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function index(Request $request)
    {
        $month = $request->get('month') ?? Carbon::now()->format('m');
        $year = $request->get('year') ?? Carbon::now()->format('Y');
        $transactions = Transaction::with('category')
            ->where('user_id', Auth::id())
            ->where('payment_type', '=', 'cash')
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->orderBy('date', 'desc');
        if ($request->has('type') && $request->type != null) {
            $transactions->whereHas('category', function ($q) use ($request) {
                $q->where('type', $request->type);
            });
        }
        // dd($request->all());
        return Inertia::render('Transactions/Index', [
            'month' => $month,
            'transactions' => $transactions->paginate(10),
            'categories' => TransactionCategory::all(['id', 'name', 'type', 'cashless']),
            'total_income' => Transaction::getTotal('income', 'cash', $month, $year),
            'total_expense' => Transaction::getTotal('expense', 'cash', $month, $year)
        ]);
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
            'contact_name' => 'nullable|string|max:255',
            'category_id' => 'required|integer',
            'description' => 'required|string|max:255',
            'due_date' => 'required_if:payment_type,noncash',
        ]);
        $transaction = Transaction::updateOrCreate(
            ['id' => $request->input('id')],
            [
                'user_id' => Auth::id(),
                'date' => $request->date,
                'amount' => $request->amount,
                'payment_type' => $request->payment_type,
                'contact_name' => $request->contact_name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'due_date' => $request->due_date,
            ]
        );
        return redirect()->route('extracker.transactions.index');
    }

    public function destroy($id)
    {
        $transaction = Transaction::where('user_id', Auth::id())->findOrFail($id);
        $transaction->delete();
        return redirect()->route('extracker.transactions.index');
    }
}
