<?php

namespace Database\Seeders\seeders_prac01;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sales')->insert([
            ['medicine_id' => 1, 'quantity' => 5, 'sale_date' => now(), 'customer_phone' => '0123456789'],
            ['medicine_id' => 2, 'quantity' => 3, 'sale_date' => now(), 'customer_phone' => '0987654321'],
        ]);
    }
}
