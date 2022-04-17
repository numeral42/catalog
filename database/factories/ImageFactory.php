<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
 
    public function definition()
    {
        return [
            'url'=>'public/products/'.$this->faker->image('public/storage/products',480,480,null,false)//products/public/storage/product
        ];
    }
}
