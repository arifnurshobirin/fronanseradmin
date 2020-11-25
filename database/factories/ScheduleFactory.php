<?php

namespace Database\Factories;

use App\Models\{Cashier,Schedule,Shift};
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Schedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cashier_id' => Cashier::factory(),
            'shift_id' => Shift::factory(),
            'date' =>$this->faker->date($format = 'Y-m-d', $min='2020-06-01', $max = 'now'),
        ];
    }
}
