<?php

namespace Database\Factories;

use App\Models\Productos;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Productos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'categoria_id' => rand(1, 5),
            'marca_id' => rand(1, 5),
            'codigo' => $this->faker->word,
            'nombre' => $this->faker->word,
            'texto' => $this->faker->text(800),
            'slug' => $this->faker->slug,
            
        ];
    }
}
