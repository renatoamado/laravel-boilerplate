<?php

namespace Database\Factories;

use App\Models\ParametrizacaoApi_parametros;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParametrizacaoApi_parametrosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ParametrizacaoApi_parametros::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'nome' => $this->faker->word,
        'apelido' => $this->faker->word,
        'ParametrizacaoApi_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
