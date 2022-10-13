<?php

namespace App\Http\Controllers\Landing;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        return view('landing.article.show', compact('article'));
    }
}
