<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i=1; $i <= 50; $i++) { 
            DB::table('customers')->insert([
                'first_name' => $faker->name(),
                'middle_name' => $faker->name(),
                'last_name' => $faker->name(),
                "email" => $faker->email(),
                'address' => $faker->address(),
                'phone' => $faker->numberBetween(8000,9000),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
