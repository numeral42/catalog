<?php

namespace Database\Factories;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{

    public function definition()
    {
        return [
            'provider_id'=>Provider::all()->random()->id,
            'date'=>$this->faker->dateTime(),    
            'status'=>$this->faker->randomElement([1,2,3,4]),
        ];
    }
}
