<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
               'name'=>'Admin',
               'email'=>'admin@gmail.com',
               'password'=> bcrypt('123456'),
               'level'=>'1',
            ],
            [
               'name'=>'Kasir',
               'email'=>'kasir@gmail.com.com',
               'password'=> bcrypt('123456'),
               'level'=>'2',
            ],
            [
               'name'=>'Meneger',
               'email'=>'meneger@gmail.com',
               'password'=> bcrypt('123456'),
               'level'=>'3',
            ]
        ]);

    }
}
