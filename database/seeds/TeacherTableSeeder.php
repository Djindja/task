<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->truncate();
        $faker = \Faker\Factory::create();

        for($i = 0; $i <= 4; $i++) {
            DB::table('teachers')->insert([
                "school_id" => rand(0, 2),
                "first_name" => $faker->firstName,
                "last_name" => $faker->lastName,
                "birth_date" => $faker->dateTime(),
                "created_at" => $faker->dateTime(),
                "updated_at" => $faker->dateTime()
            ]);
        }

    }
}
