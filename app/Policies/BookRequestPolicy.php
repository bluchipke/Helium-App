<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\BookRequest;
use App\Models\User;

class BookRequestPolicy
{
    use HandlesAuthorization;
    public function before(User $user)
    {
        if ($user->hasRole('admin')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BookRequest  $bookRequest
     * @return mixed
     */
    public function view(User $user, BookRequest $bookRequest)
    {
        
        return $user->id == $bookRequest->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        
        return true;
       
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BookRequest  $bookRequest
     * @return mixed
     */
    public function update(User $user, BookRequest $bookRequest)
    {
        // if($user->can('edit'))
        // {
        //     return $user->id == $bookRequest->user_id;
        // }

        // if($user->can('edit all posts'))
        // {
            return true;
        // }

        // if($user->hasRole(['subscriber']) && $user->id == $bookRequest->user_id)
        // {
        //     return true;
        // }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BookRequest  $bookRequest
     * @return mixed
     */
    public function delete(User $user, BookRequest $bookRequest)
    {
        return true;
    }
}
