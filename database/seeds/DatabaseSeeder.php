<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('customers')->insert(['email' => $faker->email, 'paid' => true, 'status' => true,]);
        DB::table('customers')->insert(['email' => $faker->email, 'paid' => false, 'status' => true,]);
        DB::table('customers')->insert(['email' => $faker->email, 'paid' => false, 'status' => false,]);
        DB::table('customers')->insert(['email' => $faker->email, 'paid' => true, 'status' => false,]);

        DB::table('settings')->insert(['hour' => '13:00']);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
        ]);

        foreach (range(1,20) as $index) {
	        DB::table('quotes')->insert([
	            'author' => $faker->name,
	            'quote' => $faker->paragraph,
	        ]);
	    }
    }
}
