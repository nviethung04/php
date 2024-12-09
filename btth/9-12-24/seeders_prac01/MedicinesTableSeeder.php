<?php

namespace Database\Seeders\seeders_prac01;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicinesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('medicines')->insert([
            ['name' => 'Paracetamol', 'brand' => 'Brand A', 'dosage' => '500mg', 'form' => 'Viên nén', 'price' => 2000, 'stock' => 100],
            ['name' => 'Ibuprofen', 'brand' => 'Brand B', 'dosage' => '400mg', 'form' => 'Viên nang', 'price' => 1500, 'stock' => 50],
        ]);
    }
}
