<?php

namespace App\Http\Controllers\Admin;

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
        /*
            tampung seluruh data showcase kedalam variabel $showcases, selanjutnya
            kita pecah data showcase yang kita tampilkan hanya 9 per halaman
            dengan urutan terbaru.
        */
        $showcases = Showcase::latest()->paginate(9);

        // passing variabel $showcases kedalam view.
        return view('admin.showcase.index', compact('showcases'));
    }
}
