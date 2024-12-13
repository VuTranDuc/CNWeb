<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) { // Tạo 20 bản ghi mẫu
            DB::table('computers')->insert([
                'computer_name' => $faker->word . ' Computer',
                'model' => $faker->bothify('Model-###'),
                'operating_system' => $faker->randomElement(['Windows', 'MacOS', 'Linux', 'Ubuntu']),
                'processor' => $faker->randomElement(['Intel i5', 'Intel i7', 'AMD Ryzen 5', 'AMD Ryzen 7']),
                'memory' => $faker->randomElement([4, 8, 16, 32]), // GB
                'available' => $faker->boolean(80) // 80% là true
            ]);
        }
    }
}
