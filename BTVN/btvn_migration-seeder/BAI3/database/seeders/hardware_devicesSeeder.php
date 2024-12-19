<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class hardware_devicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $faker = Faker::create();
        $it_centersIDs = DB::table('it_centers')->pluck('id')->toArray();
        for ($i = 0; $i < 10; $i++) {
            DB::table('hardware_devices')->insert([
                'name' => $faker->company,
                'type' => $faker->randomElement(['laptop', 'desktop', 'printer', 'scanner', 'server', 'switch', 'router']),
                'status' => $faker->boolean,
                'it_center_id' => $faker->randomElement($it_centersIDs),
            ]);
        }
    }
}
