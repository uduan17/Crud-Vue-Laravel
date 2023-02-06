<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\support\facades\DB;


class UserSeed extends Seeder
{
   
    public function run()
    {
        DB::table('users')->insert([
            'number_id' => '1066841096',
            'name' => 'Jose',
            'last_name' => 'Hurtado',
            'email' => 'josehut4020@gmail.com',
            'password' => bcrypt(3106443987),
        ]);
    }
}
