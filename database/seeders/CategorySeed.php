<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\support\facades\DB;


class CategorySeed extends Seeder
{
  
    public function run()
    {
        //1
        DB::table('categories')->insert([

            'name' => 'Terror',
        ]);

        //2
        DB::table('categories')->insert([

            'name' => 'Comida',
        ]);

        //3
        DB::table('categories')->insert([

            'name' => 'Carros',
        ]);
    }
}
