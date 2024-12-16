<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComputersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('computers')->insert([
            [
                'computer_name' => 'Lab1-PC05',
                'model' => 'Dell Optiplex 7090',
                'operating_system' => 'Windows 10 Pro',
                'processor' => 'Intel Core i5-11400',
                'memory' => 16,
                'available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'computer_name' => 'Lab1-PC06',
                'model' => 'HP EliteDesk 800',
                'operating_system' => 'Windows 11 Pro',
                'processor' => 'Intel Core i7-10700',
                'memory' => 32,
                'available' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
