<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu tên bảng không theo quy tắc mặc định
    protected $table = 'issues';

    // Các trường có thể được gán giá trị
    protected $fillable = [
        'computer_id', 'reported_by', 'reported_date',
        'description', 'urgency', 'status'
    ];

    // Quan hệ với bảng computers (Mỗi vấn đề sẽ thuộc về một máy tính)
    public function computer()
    {
        return $this->belongsTo(Computer::class);
    }
}
