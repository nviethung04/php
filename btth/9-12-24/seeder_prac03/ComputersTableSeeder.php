<?php

namespace Database\Seeders\seeder_prac03;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComputersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('computers')->insert([
            ['computer_name' => 'Lab1-PC5', 'model' => 'Dell Optiplex 7090', 'operating_system' => 'Windows 10 Pro', 'processor' => 'Intel Core i5-11400', 'memory' => 8, 'available' => true],
            ['computer_name' => 'Lab2-PC10', 'model' => 'HP EliteDesk 800', 'operating_system' => 'Windows 11', 'processor' => 'Intel Core i7-10700', 'memory' => 16, 'available' => false],
        ]);
    }
}
