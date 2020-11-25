<?php

namespace Database\Factories;

use App\Models\Coin;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoinFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'seribu' => $this->faker->randomElement($array = array ('1000','2000','3000')),
            'limaratus' => $this->faker->randomElement($array = array ('500','1000','1500')),
            'duaratus' => $this->faker->randomElement($array = array ('200','400','600')),
            'seratus' => $this->faker->randomElement($array = array ('100','200','300')),
            'limapuluh' => $this->faker->randomElement($array = array ('50','100','150')),
        ];
    }
}
