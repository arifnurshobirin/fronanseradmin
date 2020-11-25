<?php

namespace Database\Factories;

use App\Models\Cashier;
use Illuminate\Database\Eloquent\Factories\Factory;

class CashierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cashier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idcard' => $this->faker->unique()->numberBetween(1000000000,99999999999),
            'employee' => $this->faker->unique()->numberBetween(100,999),
            'fullName' => $this->faker->name,
            'dateofbirth' =>$this->faker->date($format = 'Y-m-d', $max = '-17 years'),
            'address' =>$this->faker->address,
            'phonenumber' =>$this->faker->phoneNumber,
            'position' =>$this->faker->randomElement($array = array ('Cashier', 'Senior Cashier','Cashier Head','TDR','Customer Service')),
            'joindate' =>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'status' =>$this->faker->randomElement($array = array ('Active', 'Inactive')),
            'avatar' => $this->faker->randomElement($array = array ('arif.jpg', 'desi.jpg','shopa.jpg','kasir1.jpg','kasir2.jpg'))
        ];
    }
}
