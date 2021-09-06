<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'category_id', 'body', 'author_id', 'commentable', 'archived', 'post_date', 'user_id'];

    protected $casts = ['title' => 'array', 'body' => 'array', 'commentable' => 'boolean', 'archived' => 'boolean', 'post_date' => 'date'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
