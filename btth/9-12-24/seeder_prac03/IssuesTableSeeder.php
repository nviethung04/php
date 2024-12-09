<?php

namespace Database\Seeders\seeder_prac03;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IssuesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('issues')->insert([
            ['computer_id' => 1, 'reported_by' => 'Alice', 'reported_date' => now(), 'description' => 'Screen flickering', 'urgency' => 'Medium', 'status' => 'Open'],
            ['computer_id' => 2, 'reported_by' => 'Bob', 'reported_date' => now(), 'description' => 'Unable to boot', 'urgency' => 'High', 'status' => 'In Progress'],
        ]);
    }
}
