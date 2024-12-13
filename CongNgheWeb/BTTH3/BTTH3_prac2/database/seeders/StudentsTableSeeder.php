<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('students')->insert([
                'first_name' => $faker->firstName, // Tạo tên riêng
                'last_name' => $faker->lastName,   // Tạo họ
                'date_of_birth' => $faker->date('Y-m-d', '2015-12-31'), // Sinh ngẫu nhiên ngày sinh (trước 2015)
                'parent_phone' => $faker->phoneNumber, // Tạo số điện thoại
                'class_id' => $faker->numberBetween(1, 10), // Liên kết tới lớp học có id từ 1-10
            ]);
        }
    }
}
