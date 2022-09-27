<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->name = "simo admin";
        $user->email = "iamsimonebonifazi@gmail.com";
        $user->password = bcrypt("originalpwd");

        $user->save();
    }
}