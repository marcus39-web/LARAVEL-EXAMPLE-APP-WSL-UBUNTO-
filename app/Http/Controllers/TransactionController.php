<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Account;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['fromAccount', 'toAccount'])->latest()->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $accounts = Account::all();
        return view('transactions.create', compact('accounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'from_account_id' => 'required|exists:accounts,id',
            'to_account_id' => 'required|exists:accounts,id|different:from_account_id',
            'amount' => 'required|numeric|min:0.01',
        ]);
        $fromAccount = Account::find($request->from_account_id);
        $toAccount = Account::find($request->to_account_id);
        $amount = $request->amount;
        try {
            if ($fromAccount->balance < $amount) {
                throw new \Exception('Insufficient funds available.');
            }
            DB::transaction(function () use ($fromAccount, $toAccount, $amount) {
                $fromAccount->decrement('balance', $amount);
                $toAccount->increment('balance', $amount);
                Transaction::create([
                    'from_account_id' => $fromAccount->id,
                    'to_account_id' => $toAccount->id,
                    'amount' => $amount,
                    'status' => 'completed'
                ]);
            });
            return redirect()->route('transactions.index')->with('success', 'Transaction completed successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
