<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    // Hiển thị danh sách máy tính
    public function index()
    {
        $computers = Computer::all();
        return view('computers.index', compact('computers'));
    }

    // Thêm máy tính mới
    public function create()
    {
        return view('computers.create');
    }

    // Lưu máy tính mới
    public function store(Request $request)
    {
        $request->validate([
            'computer_name' => 'required|string|max:50',
            'model' => 'required|string|max:100',
            'operating_system' => 'required|string|max:50',
            'processor' => 'required|string|max:50',
            'memory' => 'required|integer',
            'available' => 'required|boolean',
        ]);

        Computer::create($request->all());
        return redirect()->route('computers.index');
    }

    // Cập nhật máy tính
    public function edit(Computer $computer)
    {
        return view('computers.edit', compact('computer'));
    }

    // Lưu cập nhật
    public function update(Request $request, Computer $computer)
    {
        $request->validate([
            'computer_name' => 'required|string|max:50',
            'model' => 'required|string|max:100',
            'operating_system' => 'required|string|max:50',
            'processor' => 'required|string|max:50',
            'memory' => 'required|integer',
            'available' => 'required|boolean',
        ]);

        $computer->update($request->all());
        return redirect()->route('computers.index');
    }

    // Xóa máy tính
    public function destroy(Computer $computer)
    {
        $computer->delete();
        return redirect()->route('computers.index');
    }
}
