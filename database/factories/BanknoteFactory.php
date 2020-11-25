<?php

namespace Database\Factories;

use App\Models\Banknote;
use Illuminate\Database\Eloquent\Factories\Factory;

class BanknoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Banknote::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'seratusribu' => $this->faker->randomElement($array = array ('100000','200000','3000000')),
            'limapuluhribu' => $this->faker->randomElement($array = array ('50000','100000','150000')),
            'duapuluhribu' => $this->faker->randomElement($array = array ('20000','40000','60000')),
            'sepuluhribu' => $this->faker->randomElement($array = array ('10000','20000','30000')),
            'limaribu' => $this->faker->randomElement($array = array ('5000','10000','15000')),
            'duaribu' => $this->faker->randomElement($array = array ('2000','4000','6000')),
            'seribu' => $this->faker->randomElement($array = array ('1000','2000','3000'))
        ];
    }
}
