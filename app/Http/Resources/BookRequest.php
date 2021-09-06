<?php

namespace App\Http\Resources;

use Okami101\LaravelAdmin\Http\Resources\BaseResource;

class BookRequest extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $attributes = parent::toArray($request);

        // $attributes['category'] = Category::make($this->whenLoaded('category'));
        // $attributes['publisher'] = Publisher::make($this->whenLoaded('publisher'));
        $attributes['book'] = Book::make($this->whenLoaded('book'));
        $attributes['user'] = User::make($this->whenLoaded('user'));

        // $attributes += [
        //     'links' => [
        //         'self' => route('book-requests', $this->id),
        //     ],
        // ];

        return $attributes;
    }
}
