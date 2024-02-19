<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PemohonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'no_ktp' => $this->faker->nik(),
            'alamat' => $this->faker->city(),
            'kelamin' => $this->faker->randomElement(['male', 'female']),
            'pekerjaan' => $this->faker->jobTitle(),
            'umur' => $this->faker->numberBetween(20, 80),
            'no_hp' => $this->faker->phoneNumber,
            'status' => $this->faker->randomElement(['menikah', 'single'])
        ];
    }
}
