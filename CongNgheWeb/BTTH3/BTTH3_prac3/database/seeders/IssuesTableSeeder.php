<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Giả sử bạn có 20 máy tính trong bảng computers
        $computerIds = DB::table('computers')->pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) { // Tạo 50 bản ghi mẫu
            DB::table('issues')->insert([
                'computer_id' => $faker->randomElement($computerIds), // Chọn ngẫu nhiên máy tính
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'description' => $faker->sentence(10), // Câu ngẫu nhiên có 10 từ
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['open', 'in progress', 'resolved'])
            ]);
        }
    }
}
