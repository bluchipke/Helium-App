<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
    protected $fillable = ['user_id', 'return_status', 'states', 'book_id', 'request_date', 'status', 'notes', 'return_date', 'return_notes', 'authorized_by', 'collection'];

    protected $casts = [ 'request_date' => 'date', 'status' => 'array', 'return_date' => 'date', 'authorized_by' => 'integer', 'collection' => 'array'];

    protected function getLocale(): string
    {
        return request()->header('locale') ?: app()->getLocale();
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function authority()
    // {
    //     return $this
    // }
    
}
