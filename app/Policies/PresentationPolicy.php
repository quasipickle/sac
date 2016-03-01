<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\User;
use App\Presentation;

class PresentationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can modify (submit, update, delete)
     * the given presentation.
     *
     * @param  User  $user
     * @param  Presentation  $presentation
     * @return bool
     */

    public function modify(User $user, Presentation $presentation){
        return ($user->id === $presentation->owner) || $user->is_admin();
    }


}
