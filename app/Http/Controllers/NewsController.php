<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', ['categories' => Category::all()]);
    }

    public function list(News $news, $categoryId)
    {
        return view('news.list', ['news' => $news->getByCategoryId($categoryId)]);
    }

    public function card(News $news)
    {
        return view(
            'news.card',
            [
                'news' => $news,
            ]
        );
    }
}
