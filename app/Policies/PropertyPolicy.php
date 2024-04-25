<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PropertyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Property $property
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Property $property)
    {
        return ($user->id === $property->user_id || !!Auth::guard('admin')->user());
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Property $property
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Property $property)
    {
        return ($user->id === $property->user_id || !!Auth::guard('admin')->user());
    }

    public function activate(User $user, Property $property)
    {
        return ($user->id === $property->user_id || !!Auth::guard('admin')->user());
    }

    public function hide(User $user, Property $property)
    {
        return ($user->id === $property->user_id || !!Auth::guard('admin')->user());
    }


}
