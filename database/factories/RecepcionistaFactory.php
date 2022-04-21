<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Recepcionista;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecepcionistaFactory extends Factory
{
    protected $model = Recepcionista::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'cpf' => $this->faker->randomNumber(5, true),
            'rg' => $this->faker->randomNumber(5, true),
           // 'login' => $this->faker->randomElements(['adimição','demissão']),
            'data_nascimento' => $this->faker->date(),
            'data_admicao' => $this->faker->date(),
            'data_pagamento' => $this->faker->date(),
            'salario_fixo' => $this->faker->randomFloat(1000, 2000, 3000)
        ];
    }
}
