<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProviderFactory extends Factory
{

    public function definition()
    {
        return [
            'name'=>$this->faker->unique()->company(),
            'cuilcuit'=>$this->faker->numerify('##-########-#'),
            'address'=>$this->faker->address(),
            'phone'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->email(),
            'web'=>$this->faker->unique()->safeEmail(),  
        ];
    }
}
