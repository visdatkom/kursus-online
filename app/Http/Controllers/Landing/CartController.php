<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $carts = $request->user()->carts()->get();

        $total = $carts->sum('price');

        return view('landing.cart.index', compact('carts', 'total'));
    }
}
