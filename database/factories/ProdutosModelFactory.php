<?php

namespace Database\Factories;

use App\Models\ProdutosModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutosModelFactory extends Factory
{
    protected $model = ProdutosModel::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2,0,1000),
            'status' => $this->faker->randomElement(['A','I']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
