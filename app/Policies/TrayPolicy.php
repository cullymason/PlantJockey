<?php

namespace App\Policies;

use App\Models\Tray;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrayPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tray  $tray
     * @return mixed
     */
    public function view(User $user, Tray $tray)
    {
        return $tray->owner->id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tray  $tray
     * @return mixed
     */
    public function update(User $user, Tray $tray)
    {
        return $tray->owner->id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tray  $tray
     * @return mixed
     */
    public function delete(User $user, Tray $tray)
    {
        return $tray->owner->id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tray  $tray
     * @return mixed
     */
    public function restore(User $user, Tray $tray)
    {
        return $tray->owner->id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tray  $tray
     * @return mixed
     */
    public function forceDelete(User $user, Tray $tray)
    {
        return $tray->owner->id === $user->id;
    }
}
