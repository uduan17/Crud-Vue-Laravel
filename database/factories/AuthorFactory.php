<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AuthorFactory extends Factory
{
    protected $model = Author::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'bibliography' => $this->faker->paragraph(),
        ];
    }

    public function configure()
    {
       return $this->afterCreating(function (Author $author){
         Book::factory(8)->authorId($author)->create();
       });
    }

}
