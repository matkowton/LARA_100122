<?php

namespace App\Models;

class News
{
    private $news = [
        1 => [
            'title' => 'news 1'
        ],
        2 => [
            'title' => 'news 2'
        ]
    ];

    /**
     * @return array
     */
    public function getNews()
    {
        return $this->news;
    }
}
