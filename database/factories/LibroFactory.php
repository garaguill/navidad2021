<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Editorial;
use App\Models\Autor;

class LibroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Libro::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->name(),
            'autor_id' => $this->faker->numberBetween(1, Autor::count()),
            'editorial_id' =>  $this->faker->numberBetween(1, Editorial::count()),
            'f_publicacion'  => $this->faker->date(),
            'disponible' => $this->faker->boolean()
 
        ];

    }
}
