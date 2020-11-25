<?php

namespace Database\Factories;

use App\Models\{Consolidate,Cashier,Counter,Banknote,Coin};
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsolidateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Consolidate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cashier_id' =>Cashier::factory(),
            'counter_id' =>Counter::factory(),
            'banknote_id' =>Banknote::factory(),
            'coin_id' =>Coin::factory(),
            'nodeposit' =>$this->faker->randomElement($array = array ('100000','200000','3000000')),
            'date' =>$this->faker->date($format = 'Y-m-d', $min='2020-06-01', $max = 'now'),
            'time' =>$this->faker->time($format = 'H:i:s', $max = 'now'),
            'type' =>$this->faker->randomElement($array = array ('MDS','CVS', 'OP','SC','TH','Billpayment','Warung','Simpatindo','Antum')),
            'amount' => $this->faker->randomElement($array = array ('100000','200000','3000000'))
        ];
    }
}
