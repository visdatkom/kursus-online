<?php

namespace App\Http\Controllers\Member;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;

class RevenueController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $revenues = TransactionDetail::with('transaction', 'course')
                ->whereHas('course', function($query) use($user){
                    $query->where('user_id', $user->id);
                })->whereHas('transaction', function($query){
                    $query->Where('status', 'success');
                })->when(request()->search, function($search){
                    $search = $search->whereDate('created_at', 'like', '%'. request()->search. '%');
                })->paginate(10);

        $revenueTransaction = $revenues->sum('price');

        $tax30 = $revenueTransaction * 30/100;

        $revenueEarning = $revenueTransaction - $tax30;

        $taxTransaction = $revenues->count() * 5000;

        $revenueTax = $revenueEarning - $taxTransaction;

        return view('member.revenue.index', compact('revenueTransaction', 'revenueEarning', 'revenueTax', 'revenues'));
    }

    public function show(Transaction $transaction)
    {
        $orders = TransactionDetail::with('transaction', 'course')
            ->whereTransactionId($transaction->id)
            ->get();

        $snapToken = $transaction->snap_token;

        $grandTotal = $orders->sum('price');

        return view('member.revenue.show', compact('orders', 'snapToken', 'grandTotal', 'transaction'));
    }
}
