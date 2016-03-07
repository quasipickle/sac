<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;

class UserPolicy
{
    use HandlesAuthorization;

    public function add_course(User $user){
        return $user->is_professor();
    }

    public function remove_course(User $user){
        return $user->is_professor();
    }

    public function request_new_role(User $user){
        return $user->is_student() && !$user->requested_new_role;
    }
}
