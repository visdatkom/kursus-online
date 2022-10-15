<?php

namespace App\Http\Controllers\Landing;

use Midtrans\Snap;
use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CheckoutContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        \Midtrans\Config::$serverKey    = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized  = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds        = config('services.midtrans.is3ds');
    }

    public function store(Request $request)
    {
        $snapToken = DB::transaction(function () use($request){
            $length = 6;
            $random = '';
            for ($i = 0; $i < $length; $i++) {
                $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
            }

            $no_invoice = 'LD-'.Str::upper($random);

            $invoice = Transaction::create([
                'invoice'           => $no_invoice,
                'user_id'           => $request->user()->id,
                'name'              => $request->name,
                'grand_total'       => $request->grand_total,
                'status'            => 'pending',
            ]);

            $carts = Cart::query()
                ->where('user_id', $request->user()->id);

            foreach($carts->get() as $cart){
                $invoice->details()->create([
                    'transaction_id' => $invoice->id,
                    'course_id' => $cart->course_id,
                    'price' => $cart->price
                ]);
            }

            $payload = [
                'transaction_details' => [
                    'order_id' => $invoice->invoice,
                    'gross_amount' => $invoice->grand_total
                ],
                'customer_details' => [
                    'first_name' => $invoice->name,
                    'email' => $request->user()->email,
                ],
                'item_details' => $carts->get()->map(fn($cart) => [
                    'id' => $cart->id,
                    'price' => $cart->price,
                    'quantity' => 1,
                    'name' => $cart->course->name
                ])
            ];

            $snapToken = Snap::getSnapToken($payload);

            $invoice->snap_token = $snapToken;

            $invoice->save();

            $carts->delete();

            return $this->response['snapToken'] = $snapToken;
        });

        return view('landing.cart.checkout', compact('snapToken'));
    }
}
