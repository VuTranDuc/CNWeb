<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Schema;

class laptopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $rentersIds = DB::table('renters')->pluck('id')->toArray();  // Lấy tất cả id từ bảng renters
        for ($i = 0; $i < 10; $i++) {
            DB::table('laptops')->insert([
                'brand' => $faker->company,  // Hãng sản xuất
                'model' => $faker->word,  // Mẫu laptop
                'specification' => $faker->word . ', ' . $faker->randomDigit() . 'GB RAM, ' . $faker->randomDigit() . 'GB SSD',  // Thông số kỹ thuật
                'rental_status' => $faker->boolean,  // Trạng thái cho thuê (true/false)
                'renter_id' => $faker->randomElement($rentersIds),
            ]);
        }
    }
}
