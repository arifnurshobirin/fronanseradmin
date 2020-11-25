<?php

namespace Database\Factories;

use App\Models\Shift;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShiftFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shift::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codeshift' =>$this->faker->unique()->randomElement($array = array ('OFF','A7','A8','A9','A10','A11','A12','A13','A14','A15','A16',
                                                        'B7','B8','B9','B10','B11','B12','B13','B14','B15','B16','B17','B18')),
            'startshift' =>$this->faker->time($format = 'H:i:s', $max = 'now'),
            'endshift' =>$this->faker->time($format = 'H:i:s', $max = 'now'),
            'workinghour' =>$this->faker->randomElement($array = array ('7','5'))
        ];
    }
}
