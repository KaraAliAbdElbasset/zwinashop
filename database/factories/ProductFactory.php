<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        $nb = random_int(1,16);
        if ($nb < 10)
        {
            $nb = '0'.$nb;
        }
        return [
            'name' => $this->faker->words(10,true),
            'excerpt' => $this->faker->sentence(20),
            'description' => $this->faker->paragraph(4),
            'image' => asset('assets/site/images/product-'.$nb.'.jpg'),
            'is_active' => true,
            'price' => random_int(1000,10000),
            'qte' => random_int(100,200),
            'featured' => (int)$nb % 2 === 0,
            'inspired' => (int)$nb % 2 !== 0,
        ];
    }
}
