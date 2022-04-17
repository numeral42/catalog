<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'order_product';

    public function product($product_id){

        $product=Product::
            where('id',$product_id)
            ->first();
     
           return $product; 

    }
}
