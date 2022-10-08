<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $transactions = Transaction::with('details.course', 'user')
                ->latest()
                ->paginate(10);

        $grandTotal = $transactions->sum('grand_total');

        return view('admin.transaction.index', compact('transactions', 'grandTotal'));
    }
}
