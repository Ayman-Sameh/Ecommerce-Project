<?php

namespace Database\Factories;

use App\Models\Product;
use Database\Factories\Unique;
use Illuminate\Database\Eloquent\Factories\Factory;

class productFactory extends Factory
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
     */
    public function definition()
    {
        return [
            'category_id'  => $this->faker->numberBetween(1,10),
            'name'         => $this->faker->name(),
            'price'        => rand(100,1000),
            'description'  => $this->faker->text(),
            'offer'        => rand(1,100),
            'image'        => 'pic_' . $this->faker->Unique()->numberBetween(1,40) . '.jpg',
        ];
    }
}
