<?php

namespace Database\Factories;

use App\Models\Counter;
use Illuminate\Database\Eloquent\Factories\Factory;

class CounterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Counter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nocounter' => $this->faker->unique()->numberBetween(1,99),
            'ipaddress' => $this->faker->unique()->ipv4,
            'macaddress' => $this->faker->unique()->macAddress,
            'type' => $this->faker->randomElement($array = array ('Regular', 'SaladBar','Milk','Wine','Deptstore',
                                                    'Electronic','TransHello','Homedel','Cigarette','TransLiving',
                                                    'TransHardware','Bakery','Dokar','Canvasing','Backup')),
            'status' => $this->faker->randomElement($array = array ('Queueing','Active', 'Inactive','Broken'))
        ];
    }
}
