<?php

namespace Database\Factories;

use App\Models\Laundry;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LaundryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Laundry::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>Str::random(20),
            'description'=>Str::random(50),
            'id_owner'=> 12,
        ];
    }
}
