<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function news() {
        return $this->hasMany(News::class);
    }

    public function getList()
    {
        return Category::select(['id', 'name'])
            ->get()
            ->pluck('name', 'id');
    }
}
