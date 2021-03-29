<?php


namespace Database\Factories;


use App\Models\Contractor;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        $contractors = Contractor::pluck('id')->toArray();
        $products = Product::pluck('id')->toArray();
        $i = 1;
        $randProducts = [];
        while ($i <= random_int(1, 3)):
            $randProducts[] = $this->faker->randomElement($products);
            $i++;
        endwhile;

        return [
            'sum' => random_int(2, 10000),
            'contractor_id' => $this->faker->randomElement($contractors),
            'id_products' => json_encode($randProducts),
        ];
    }

}
