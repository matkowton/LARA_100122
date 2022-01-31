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
        'source',
        'publish_date',
        'category_id'
    ];

    public static function getByCategoryId(int $categoryId)
    {
        return static::query()
            ->where('category_id', $categoryId)
            ->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function rules()
    {
        return [
            'title' => 'required|min:10|max:50|unique:news',
            'description' => 'max:1000| required',
            'category_id' => 'required|integer|exists:categories,id',
            'active' => 'boolean',
            'publish_date' => 'date'
        ];
    }

    public function validate()
    {
        $validator = \Validator::make($this->attributes, static::rules());
        return !$validator->fails();
    }
}
