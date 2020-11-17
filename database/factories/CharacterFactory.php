<?php

namespace Database\Factories;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Character::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'birthday' => $this->faker->dateTimeThisCentury->format('Y-m-d'),
            'occupations' => json_encode($this->faker->words(5)),
            'img' => $this->faker->imageUrl(250, 250, 'people'),
            'nickname' => $this->faker->userName,
            'portrayed' => $this->faker->name
        ];
    }
}
