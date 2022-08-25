<?php

namespace Database\Factories;

use App\Models\ParametrizacaoApi;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParametrizacaoApiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ParametrizacaoApi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'status' => $this->faker->word,
        'nome' => $this->faker->word,
        'tipo' => $this->faker->word,
        'cache_expiracao' => $this->faker->word,
        'url' => $this->faker->word,
        'rotulo' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
