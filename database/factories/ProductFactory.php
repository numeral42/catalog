<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{

    public function definition()
    {
        $name=$this->faker->unique()->text(40);

        return [
            'name'=>$name,
            'slug'=>Str::slug($name),
            'provider_id'=>Provider::all()->random()->id,
            'description'=>$this->faker->text(40),
            'status'=>$this->faker->randomElement([1,2,3,4]),
            'price'=>$this->faker->numerify('###.##'),
            'stock'=>$this->faker->numerify('###'),
            'category_id'=>Category::all()->random()->id,
            'user_id'=>User::all()->random()->id,
            'provider_id'=>Provider::all()->random()->id,
        ];
    }
}
