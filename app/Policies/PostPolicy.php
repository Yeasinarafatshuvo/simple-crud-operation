<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function isAdmin(User $user)
    {
        return $user->email === 'admin1@gmail.com';
    }

    // public function isAdmin(User $user)
    // {
    //     return $user->email === 'admin1@gmail.com' ? Response::allow() : Response::deny('You do not own this post');
    // }

}
