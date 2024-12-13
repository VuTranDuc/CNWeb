<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gradeLevels = ['kindergarden', 'elementary', 'middle', 'high'];

        for ($i = 0; $i < 10; $i++) {
            DB::table('classes')->insert([
                'grade_level' => $gradeLevels[array_rand($gradeLevels)],
                'room_number' => 'Room ' . random_int(1, 100),
            ]);
        }
    }
}

