<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

class AllianceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Alliance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'creation_date' => $this->faker->date(),
            'goal' => $this->faker->text(10),
            'responsable_organization' => $this->faker->random
            
        ];
    }
}
