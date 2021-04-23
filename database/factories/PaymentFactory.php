<?php


namespace Database\Factories;


use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $orders = Order::pluck('id')->toArray();

        return [
            'paid' => $this->faker->boolean,
            'order_id' => $this->faker->randomElement($orders),
            'type' => $this->faker->randomElement(['card','cash']),
            'payer_account' => $this->faker->numberBetween('1111111111', '2147483647'),
        ];
    }

}
