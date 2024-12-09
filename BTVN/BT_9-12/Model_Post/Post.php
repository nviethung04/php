<?php

namespace App\Models\Model_Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Các trường được phép mass assign
    protected $fillable = [
        'title',
        'content',
    ];

    // Nếu muốn, có thể định nghĩa các mối quan hệ ở đây
}
