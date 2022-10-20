<?php

namespace App\Http\Controllers\Landing;

use App\Models\Showcase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowcaseController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $showcases = Showcase::get();

        return view('landing.showcase.index', compact('showcases'));
    }
}
