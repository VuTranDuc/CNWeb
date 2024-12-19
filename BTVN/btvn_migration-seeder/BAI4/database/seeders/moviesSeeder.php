<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class moviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $cinemaIds = DB::table('cinemas')->pluck('id')->toArray();
        for ($i = 0; $i < 10; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->sentence,  // Tiêu đề phim
                'director' => $faker->name,  // Đạo diễn
                'release_date' => $faker->date,  // Ngày phát hành
                'duration' => $faker->numberBetween(80, 180),  // Thời gian (phút)
                'cinema_id' => $faker->randomElement($cinemaIds),  // ID của cinema ngẫu nhiên
            ]);
        }
    }
}
