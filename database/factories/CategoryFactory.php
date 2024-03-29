<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Stringable;

class CategoryFactory extends Factory
{

    public function definition()
    {
        $name=$this->faker->unique()->word(20);
        return [
            'name'=>$name,
            'slug'=>Str::slug($name)
        ];
    }
}
