<?php

namespace App\Policies;

use App\Products;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
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
    public function modify(User $user, Products $products)
    {
        //
        if($user->id == 1)
        {
            if($products->user_id == 1)
            {
                return $user->id == $products->user_id;
            }
            return $user->id != $products->user_id;
        }
            return $user->id == $products->user_id;

    }
}
