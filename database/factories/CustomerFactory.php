<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'subscribtion_end_date'=>'2022-01-7',
            'email'=>$this->faker->unique()->safeEmail()
        ];
    }
}
