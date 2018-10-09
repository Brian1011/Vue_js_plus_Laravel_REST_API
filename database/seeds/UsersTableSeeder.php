<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //clear the table first
        User::truncate();

        $faker = \Faker\Factory::create();

        //let's make sure everyone has the same password
        //  and let's hash it before looping or
        // else our seeder will be too slow

        $password = Hash::make('toptal');

        User::create([
            'name' => 'Adminstrator',
            'email' => 'admin@test.com',
            'password' => $password
        ]);

        //And now lets generate a few dozen users for our app
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }


    }
}
