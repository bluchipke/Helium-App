<?php

namespace App\Listeners;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Review;
use App\Models\User;
use App\Models\BookRequest;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Database\Eloquent\Builder;

class ApplyPermissionsScopes
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Authenticated  $event
     * @return void
     */
    public function handle($event)
    {
        /** @var User $user */
        $user = $event->user;

        if ($user->hasRole('admin')) {
            return;
        }

        $this->applyPublishersScopes($user);
        // $this->applyAuthorsScopes($user);
        // $this->applyBooksScopes($user);
        $this->applyReviewsScopes($user);
        // $this->applyBookRequestsScopes($user);
    }

    private function applyPublishersScopes(User $user)
    {
        Publisher::addGlobalScope('user', function (Builder $builder) use ($user) {
            $builder->hasUser($user);
        });
    }

    private function applyAuthorsScopes(User $user)
    {
        Author::addGlobalScope('user', function (Builder $builder) use ($user) {
            $builder->hasUser($user);
        });
    }

    // private function applyBookRequestsScopes(User $user)
    // {
    //     BookRequest::addGlobalScope('user', function (Builder $builder) use ($user) {
    //         $builder->where(function (Builder $query) use ($user) {
    //             if ($user->hasRole('subscriber')) {
    //                 // $query->whereHas('bookRequest', function (Builder $query) use ($user) {
    //                     $query->whereIn('user_id', $user->user_requests()->pluck('id'));
    //                 // });
    //             }
    //         });
    //     });
       
    // }

    // private function applyBooksScopes(User $user)
    // {
    //     Book::addGlobalScope('user', function (Builder $builder) use ($user) {
    //         $builder->where(function (Builder $query) use ($user) {
    //             if ($user->hasRole('editor')) {
    //                 $query->whereIn('publisher_id', $user->publishers()->pluck('id'));
    //             }
    //             if ($user->hasRole('author')) {
    //                 $query->whereHas('authors', function (Builder $query) use ($user) {
    //                     $query->whereIn('id', $user->authors()->pluck('id'));
    //                 });
    //             }
    //         });
    //     });
    // }

    private function applyReviewsScopes(User $user)
    {
        Review::addGlobalScope('user', function (Builder $builder) use ($user) {
            $builder->where(function (Builder $query) use ($user) {
                if ($user->hasRole('editor')) {
                    $query->whereHas('book', function (Builder $query) use ($user) {
                        $query->whereIn('publisher_id', $user->publishers()->pluck('id'));
                    });
                }
                if ($user->hasRole('author')) {
                    $query->whereHas('book.authors', function (Builder $query) use ($user) {
                        $query->whereIn('id', $user->authors()->pluck('id'));
                    });
                }
            });
        });
    }
}
