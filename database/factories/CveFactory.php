<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cve;

class CveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cve::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cve_code' => $this->faker->word,
            'cvss' => $this->faker->numberBetween(-10000, 10000),
            'nessus_cod' => $this->faker->word,
            'nmap_cod' => $this->faker->word,
            'en_description' => $this->faker->text,
            'es_description' => $this->faker->text,
        ];
    }
}
