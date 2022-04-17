<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $guarded=['id', 'created_at', 'update_at'];

    //Relación uno a muchos

    public function products(){
        return $this->hasMany(Product::class);
    }
}
