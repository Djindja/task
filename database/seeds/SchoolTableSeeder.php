<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->truncate();
        $faker = \Faker\Factory::create();

        for($i = 0; $i <= 5; $i++) {
            DB::table('schools')->insert([
                "school_name" => $faker->city,
                "year_founded" => $faker->dateTime(),
                "city" => $faker->city,
                "created_at" => $faker->dateTime(),
                "updated_at" => $faker->dateTime()
            ]);
        }

    }
}
