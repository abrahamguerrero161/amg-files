<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
//use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->text(),
            'url' => $this->faker->sentence(),
            'format' => $this->faker->word(10),
            'userId' => $this->faker->randomDigit(),
            'category' => $this->faker->name(),
            'image' => 'posts/'. $this->faker->image('public/storage/posts', 640, 480, null, false)
        ];
    }
}
