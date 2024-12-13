<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i = 0; $i <10; $i++){
            DB::table('medicines')->insert([
                'name'=>$faker->sentence,
                'brand'=>$faker->sentence,
                'dosage' => $faker->randomElement(['500mg', '250mg', '1g']), // Liều lượng
                'form' => $faker->randomElement(['Tablet', 'Capsule', 'Syrup']), // Dạng bào chế
                'price' => $faker->randomFloat(2, 5, 100), // Giá từ 5 đến 100 với 2 chữ số thập phân
                'stock' => $faker->numberBetween(10, 500), // Số lượng tồn kho từ 10 đến 500
            ]);
        }
    }
}
