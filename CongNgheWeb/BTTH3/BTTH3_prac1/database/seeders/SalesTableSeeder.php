<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

    // Lấy danh sách ID từ bảng medicines
    $medicineIds = DB::table('medicines')->pluck('medicine_id');

    // Kiểm tra nếu không có dữ liệu trong bảng medicines
    if ($medicineIds->isEmpty("Exception")) {
        throw new Exception('No medicines found. Please seed the medicines table first.');
    }

    // Tạo 10 bản ghi giả cho bảng sales
    for ($i = 0; $i < 10; $i++) {
        DB::table('sales')->insert([
            'medicine_id' => $faker->randomElement($medicineIds), // Chọn ngẫu nhiên một ID từ bảng medicines
            'quantity' => $faker->numberBetween(1, 100), // Số lượng bán
            'sale_date' => $faker->dateTimeBetween('-1 year', 'now'), // Ngày bán từ năm trước đến hiện tại
            'customer_phone' => $faker->phoneNumber, // Số điện thoại ngẫu nhiên
        ]);
    }
    }
}
