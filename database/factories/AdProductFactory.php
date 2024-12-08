<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdProduct>
 */
class AdProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(3),
            'images' => $this->faker->imageUrl(640, 480, 'food'),
            'category' => $this->faker->sentence(1),
            'prices' => $this->faker->numberBetween(10, 1000),
            'promotional_price' => $this->faker->optional()->numberBetween(10, 1000),
            'quantity' => $this->faker->numberBetween(1, 100),
            'locate' => 'Rio Pomba - MG',
            'contact_link' => 'https://web.whatsapp.com/send?phone=5532998424469/?text=Ol%C3%A1%2C+vi+o+seu+an%C3%BAncio+' . urlencode($this->faker->sentence(3)) . '+no+app+Feirine%2C+e+gostaria+de+saber+mais+informa%C3%A7%C3%B5es+so+bre+o+produto.',
            'expired_at' => $this->faker->dateTimeBetween('now', '+3 months'),
            'type' => $this->faker->randomElement(['new', 'new_used','good','used']),
        ];
    }
}
