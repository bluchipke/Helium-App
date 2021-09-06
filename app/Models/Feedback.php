<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Feedback extends Model
{
    use HasTranslations;

    protected $fillable = ['subject', 'body', 'parent_id', 'order_column', 'closed'];

    protected $casts = ['order_column' => 'integer', 'closed' => 'boolean'];

    public $translatable = ['subject', 'body'];

    protected function getLocale(): string
    {
        return request()->header('locale') ?: app()->getLocale();
    }
}
