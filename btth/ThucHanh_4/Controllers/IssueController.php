<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;
use Carbon\Carbon; // Thêm Carbon để làm việc với ngày giờ

class IssueController extends Controller
{
    // Hiển thị danh sách các vấn đề
    public function index()
    {
        // Lấy tất cả các vấn đề cùng với thông tin máy tính
        $issues = Issue::with('computer')->get();
        return view('issues.index', compact('issues'));
    }

    // Thêm vấn đề mới
    public function create()
    {
        // Lấy tất cả máy tính để chọn khi tạo vấn đề
        $computers = Computer::all();
        return view('issues.create', compact('computers'));
    }

    // Lưu vấn đề mới
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        // Chuyển reported_date thành định dạng Carbon nếu cần
        $request->merge([
            'reported_date' => Carbon::parse($request->reported_date),
        ]);

        // Lưu vấn đề mới vào cơ sở dữ liệu
        Issue::create($request->all());
        return redirect()->route('issues.index');
    }

    // Cập nhật thông tin vấn đề
    public function edit(Issue $issue)
    {
        // Chuyển đổi reported_date thành đối tượng Carbon nếu cần
        $issue->reported_date = Carbon::parse($issue->reported_date);

        // Lấy danh sách máy tính để chọn khi sửa
        $computers = Computer::all();
        return view('issues.edit', compact('issue', 'computers'));
    }

    public function update(Request $request, Issue $issue)
    {
        // Validate input
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        // Chuyển reported_date thành định dạng Carbon nếu cần
        $request->merge([
            'reported_date' => Carbon::parse($request->reported_date),
        ]);

        // Cập nhật thông tin vấn đề
        $issue->update($request->all());
        return redirect()->route('issues.index');
    }

    // Xóa vấn đề
    public function destroy(Issue $issue)
    {
        // Xóa vấn đề khỏi cơ sở dữ liệu
        $issue->delete();
        return redirect()->route('issues.index');
    }
}
