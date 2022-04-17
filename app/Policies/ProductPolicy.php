<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

use Spatie\Permission\Traits\HasRoles;

class ProductPolicy
{
    use HandlesAuthorization;

    use HasRoles;

    public function __construct()
    {
        //
    }

    public function author(User $user, Product $product){
        /* if($user->id == $product->user_id){ */
        if(auth()->user()->hasRole('Admin')){
            return true;
        }else{
            return false;
        }

    }

    public function published(?User $user, Product $product){
        if($product->status==1 || $product->status==2 || $product->status==3){
            return true;
        }else{
            return false;
        }
    }
}
