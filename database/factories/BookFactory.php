<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'author_id' =>  $this->faker->numberBetween(1, 1000),
            'category_id' =>  $this->faker->numberBetween(1, 3000),
            'description' => $this->faker->paragraph(),
            'cover_image' => $this->faker->imageUrl(400, 600, 'books', true, 'book'),
        ];
    }
}
