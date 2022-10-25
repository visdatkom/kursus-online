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
        // tampung seluruh data showcase kedalam variabel $showcases, kemudian data showcase kita urutan dari yang paling terbaru.
        $showcases = Showcase::latest()->get();

        // passing variabel $showcases kedalam view.
        return view('landing.showcase.index', compact('showcases'));
    }
}
