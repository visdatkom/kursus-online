<?php

namespace App\Http\Controllers\Member;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::with('details')
            ->where('user_id', $request->user()->id)
            ->paginate(10);

        return view('member.transaction.index', compact('transactions'));
    }

    public function show(Transaction $transaction)
    {
        $orders = TransactionDetail::with('transaction', 'course')
            ->whereTransactionId($transaction->id)
            ->get();


        $snapToken = $transaction->snap_token;

        $grandTotal = $orders->sum('price');

        return view('member.transaction.show', compact('orders', 'snapToken', 'grandTotal', 'transaction'));
    }
}
