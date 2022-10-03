<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\UserDetail;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run( Faker $faker)
    {
        for($i = 0; $i <10; $i++){
            $new_user_detail = new UserDetail();

            $new_user_detail->paypal = $faker->text(25);
            $new_user_detail->residence = $faker->email();
            $new_user_detail->country = $faker->text(25);
            $new_user_detail->language = $faker->text(25);

            $new_user_detail->save();
        }
    }
}