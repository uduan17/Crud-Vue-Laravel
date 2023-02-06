<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeed;
use Database\Seeders\CategorySeed;


class DatabaseSeeder extends Seeder
{
    
    public function run()
    {

      $this->call([
       UserSeed::class,
       CategorySeed::class
       ]);

        User::factory(100)->create();
        Author::factory(100)->create();
    }
}
