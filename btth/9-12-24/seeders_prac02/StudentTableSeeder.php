<?php

namespace Database\Seeders\seeders_prac02;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('students')->insert([
            ['first_name' => 'John', 'last_name' => 'Doe', 'date_of_birth' => '2015-01-01', 'parent_phone' => '0123456789', 'class_id' => 1],
            ['first_name' => 'Jane', 'last_name' => 'Smith', 'date_of_birth' => '2016-02-02', 'parent_phone' => '0987654321', 'class_id' => 2],
        ]);
    }
}
