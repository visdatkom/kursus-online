<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transactions = Transaction::with('details.course', 'user')
                ->latest()
                ->search('status')
                ->paginate(10)
                ->withQueryString();

        $grandTotal = $transactions->sum('grand_total');

        return view('admin.transaction.index', compact('transactions', 'grandTotal'));
    }

    public function show(Transaction $transaction)
    {
        $orders = TransactionDetail::with('transaction', 'course')
            ->whereTransactionId($transaction->id)
            ->get();


        $snapToken = $transaction->snap_token;

        $grandTotal = $orders->sum('price');

        return view('admin.transaction.show', compact('orders', 'grandTotal', 'transaction', 'snapToken'));
    }
}
