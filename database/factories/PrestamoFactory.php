<?php

namespace Database\Factories;

use App\Models\Prestamo;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Libro;
use App\Models\Socio;

class PrestamoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Prestamo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'libro_id' => $this->faker->numberBetween(1, Libro::count()),
            'socio_id' =>  $this->faker->numberBetween(1,Socio::count()),
            'f_inicial'  => $this->faker->date(),
            'f_final' => $this->faker->date()
        ];
    }
}
