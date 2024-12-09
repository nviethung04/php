<?php

namespace App\Http\Controllers\Controller_Post;

use App\Http\Controllers\Controller; // Import lớp Controller
use App\Models\Model_Post\Post; // Import model Post
use Illuminate\Http\Request; // Import Request

class PostController extends Controller
{
    // Hiển thị danh sách các bài viết
    public function index()
    {
        $posts = Post::all();  // Lấy tất cả bài viết từ cơ sở dữ liệu
        return view('Views_Post.posts.index', compact('posts'));  // Đảm bảo sử dụng đúng đường dẫn view
    }

    // Hiển thị chi tiết bài viết
    public function show($id)
    {
        $post = Post::findOrFail($id);  // Lấy bài viết theo ID, nếu không tìm thấy sẽ trả lỗi 404
        return view('Views_Post.posts.show', compact('post'));  // Đảm bảo sử dụng đúng đường dẫn view
    }

    // Hiển thị form để tạo bài viết mới
    public function create()
    {
        return view('Views_Post.posts.create');  // Cập nhật đường dẫn view
    }

    // Lưu bài viết mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create($request->all());  // Lưu bài viết mới vào cơ sở dữ liệu
        return redirect()->route('posts.index');  // Chuyển hướng về trang danh sách bài viết
    }
}
