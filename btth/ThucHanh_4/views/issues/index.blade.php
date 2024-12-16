<!-- Thêm link Bootstrap CSS vào phần <head> -->
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<!-- Bảng danh sách các vấn đề -->
<div class="container mt-5">
    <h2 class="mb-4">Danh sách Vấn Đề</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
        <tr>
            <th>Mã vấn đề</th>
            <th>Tên máy tính</th>
            <th>Tên phiên bản</th>
            <th>Người báo cáo sự cố</th>
            <th>Thời gian báo cáo</th>
            <th>Mức độ sự cố</th>
            <th>Trạng thái hiện tại</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($issues as $issue)
            <tr>
                <td>{{ $issue->id }}</td>
                <td>{{ $issue->computer->computer_name }}</td>
                <td>{{ $issue->computer->model }}</td>
                <td>{{ $issue->reported_by }}</td>
                <td>{{ $issue->reported_date }}</td>
                <td>{{ $issue->urgency }}</td>
                <td>{{ $issue->status }}</td>
                <td>
                    <!-- Sửa -->
                    <a href="{{ route('issues.edit', $issue) }}" class="btn btn-warning btn-sm">Sửa</a>

                    <!-- Xóa -->
                    <form action="{{ route('issues.destroy', $issue) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa vấn đề này không?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('issues.create') }}" class="btn btn-success">Thêm vấn đề mới</a>
</div>

<!-- Thêm link Bootstrap JS vào trước thẻ đóng </body> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
