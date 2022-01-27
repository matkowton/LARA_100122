<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\NewsOld;

class NewsController extends Controller
{
    public function index()
    {

        $news = News::with('category')->get();

        foreach ($news as $item) {
            dump($item->category->name);
        }

        return view('news.index', ['news' => []]);
    }

    public function list(int $categoryId)
    {

        return view('news.list', ['news' => News::getByCategoryId($categoryId)]);
    }


    public function card(News $news)
    {
        return view('news.card', ['item' => $news]);
    }
}
