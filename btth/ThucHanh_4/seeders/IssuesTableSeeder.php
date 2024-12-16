<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IssuesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('issues')->insert([
            [
                'computer_id' => 1,
                'reported_by' => 'Nguyen Van A',
                'reported_date' => now(),
                'description' => 'Máy tính không khởi động được.',
                'urgency' => 'High',
                'status' => 'Open',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'computer_id' => 2,
                'reported_by' => 'Tran Thi B',
                'reported_date' => now(),
                'description' => 'Máy tính chạy chậm và treo.',
                'urgency' => 'Medium',
                'status' => 'In Progress',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
