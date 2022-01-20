<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index(News $news)
    {
        $news = $news->getNews();
        return view('news.index', ['news' => $news]);
    }

    public function card(News $news, $id)
    {
        return view('news.card', ['item' => $news->getByuId($id)]);
    }
}
