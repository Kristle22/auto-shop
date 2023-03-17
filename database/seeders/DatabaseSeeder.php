<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        $faker = Faker::create('en_EN');
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));

        DB::table('users')->insert([
            'name' => 'Kristina',
            'email' => 'crislayn@yahoo.com',
            'password' => Hash::make('kriste22')
        ]);

        $makCount = 20;
        foreach(range(1, $makCount) as $_) {
            DB::table('makers')->insert([
                'name' => $faker->company
            ]);
        }

        $imgStorage = 'http://localhost/auto-shop/public/car-images/';

        foreach(range(1, 200) as $_) {
            DB::table('cars')->insert([
                'name' => $faker->vehicleBrand,
                'plate' => $faker->vehicleRegistration,
                'about' => $faker->realText(rand(50, 100)),
                'photo' => rand(0, 3) ? $imgStorage.$faker->image($dir=public_path().'/car-images', 300, 200, ['cars'], false) : null, 
                'maker_id' => rand(1, $makCount)
            ]);
        }
    }
}
