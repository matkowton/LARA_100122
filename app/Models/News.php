<?php

namespace App\Models;

class News
{
    private $news = [
        1 => [
            'title' => 'news 1',
            'description' => 'jkljskljkljkl',
            'category_id' => 3
        ],
        2 => [
            'title' => 'news 2',
            'description' => 'jkljskljkljkl',
            'category_id' => 4
        ]
    ];

    /**
     * @return array
     */
    public function getNews()
    {
        return $this->news;
    }

    public function getByCategoryId(int $categoryId)
    {
        $return = [];
        foreach ($this->news as $item) {
            if($item['category_id'] == $categoryId) {
                $item['category_id'] = 100;
                $return[] = $item;
            }
        }
        return $return;
    }

    public function getByuId($id)
    {
        return $this->news[$id];
    }
}
