<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'category_id'
    ];

    public static function getByCategoryId(int $categoryId)
    {
        return static::query()
            ->where('category_id', $categoryId)
            ->get();
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
