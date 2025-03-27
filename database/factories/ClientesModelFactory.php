<?php

namespace Database\Factories;

use App\Models\ClientesModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientesModelFactory extends Factory
{
    protected $model = ClientesModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'       => $this->faker->name,
            'email'      => $this->faker->unique()->safeEmail,
            'birth'      => $this->faker->date('Y-m-d'),
            'cellphone'  => $this->faker->numerify('###########'), // Gera 11 dígitos (DDD + número)
            'zip_code'   => $this->faker->postcode,
            'house'      => $this->faker->buildingNumber,
            'estate'     => $this->faker->stateAbbr,
            'streat'     => $this->faker->streetName,
            'city'       => $this->faker->city,
            'district'   => $this->faker->word,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
