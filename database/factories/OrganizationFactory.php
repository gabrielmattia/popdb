<?php

namespace Database\Factories;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Organization::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cnpj' => $this->faker->numerify('#####'),
            'name' => $this->faker->name,
            'zip_code' => $this->faker->postcode(),
            'street' => $this->faker->streetName(),
            'number' => $this->faker->buildingNumber(),
            'neighborhood' => $this->faker->streetSuffix(),
            'city' => $this->faker->city(),
            'state' => $this->faker->city(),
            'country' => $this->faker->country(),
            'site' => $this->faker->url(),
            'category' => 43419,
        ];
    }
}
