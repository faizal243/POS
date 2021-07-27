<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
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
