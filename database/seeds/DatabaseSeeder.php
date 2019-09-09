<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        for($i = 0; $i < 100; $i++) {
            App\User::create([
                'name' => $faker->firstName,
                'lastname' => $faker->lastName,
                'email' => $faker->email,
                'password' => bcrypt('secret')
            ]);
        }

//        DB::table('users')->insert([
//            'name' => str_random(10),
//            'email' => str_random(10).'@gmail.com',
//            'password' => bcrypt('secret'),
//        ]);
    }
}
