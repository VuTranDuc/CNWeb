<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $gradeLevels = ['Kindergarten', 'Elementary', 'Middle', 'High']; // Các giá trị cho grade_level

        for ($i = 0; $i < 10; $i++) {
            DB::table('classes')->insert([
                'grade_level' => $faker->randomElement($gradeLevels), // Lựa chọn ngẫu nhiên một giá trị
                'room_number' => 'Room ' . $faker->numberBetween(1, 100), // Tạo số phòng từ 1 đến 100
            ]);
        }
    }
}
