<?php

namespace App\Policies;

use App\Models\Publisher;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PublisherPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        // if (!$user->hasRole('editor')) {
        //     return false;
        // }
    }

    /**
     * Determine whether the user can view any publishers.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the publisher.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Publisher  $publisher
     * @return mixed
     */
    public function view(User $user, Publisher $publisher)
    {
        return true;
    }

    /**
     * Determine whether the user can create publishers.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if (!$user->hasRole('admin')) {
            return false;
        }
    }

    /**
     * Determine whether the user can update the publisher.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Publisher  $publisher
     * @return mixed
     */
    public function update(User $user, Publisher $publisher)
    {
        if (!$user->hasRole('admin')) {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the publisher.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Publisher  $publisher
     * @return mixed
     */
    public function delete(User $user, Publisher $publisher)
    {
        if (!$user->hasRole('admin')) {
            return false;
        }
    }
}
