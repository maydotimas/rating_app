<?php

use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Reactions;

class reactionsSeeder extends Seeder
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

        for ($i = 1; $i <= 5 ; $i++) {
            array_push($data, [
                'name'     => $faker->colorName,
                'image'    => $faker->text(10),
                'type' => $faker->randomElement(['positive', 'neutral', 'negative']),
            ]);
        }

        Reactions::insert($data);
    }
}
