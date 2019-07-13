<?php

use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use App\UserReactions;

class userreactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $data = [];

        for ($i = 1; $i <= 10000 ; $i++) {
            array_push($data, [
                'mobile_id'     => $faker->numberBetween(1,1000),
                'reaction_id'    => $faker->numberBetween(1,10),
                'created_at' => $faker->dateTimeBetween('-2 years','+2 years'),
            ]);
        }

        UserReactions::insert($data);
    }
}
