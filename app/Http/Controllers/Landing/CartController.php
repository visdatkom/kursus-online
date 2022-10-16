<?php

namespace App\Http\Controllers\Landing;

use App\Models\Cart;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $carts = $request->user()->carts()->get();

        $total = $carts->sum('price');

        $user = $request->user();

        return view('landing.cart.index', compact('carts', 'total', 'user'));
    }

    public function store(Request $request, Course $course)
    {
        $course->carts()->updateOrCreate([
            'user_id' => $request->user()->id,
            'course_id' => $course->id,
        ],[
            'user_id' => $request->user()->id,
            'price' => $course->price - ($course->price * $course->discount / 100),
        ]);

        return redirect(route('cart.index'))->with('toast_success', 'Item berhasil ditambahkan ke cart');
    }

    public function delete(Cart $cart)
    {
        $cart->delete();

        return back()->with('toast_success', 'Item berhasil dihapus dari cart');
    }
}
