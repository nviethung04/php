<?php

namespace Database\Seeders\seeders_prac02;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('classes')->insert([
            ['grade_level' => 'Pre-K', 'room_number' => 'VH7'],
            ['grade_level' => 'Kindergarten', 'room_number' => 'VH8'],
        ]);
    }
}
