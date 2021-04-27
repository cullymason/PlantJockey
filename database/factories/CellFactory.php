<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cell;
use App\Models\Plant;
use App\Models\Tray;

class CellFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cell::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'row' => $this->faker->randomNumber(2),
            'column' => $this->faker->randomLetter,
            'tray_id' => Tray::factory(),
            'plant_id' => Plant::factory(),
        ];
    }
}
