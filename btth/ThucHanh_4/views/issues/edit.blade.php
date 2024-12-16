<!-- Thêm link Bootstrap CSS vào phần <head> -->
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<!-- Form bắt đầu -->
<div class="container mt-5">
    <h2 class="mb-4">Cập nhật Vấn Đề</h2>

    <form action="{{ route('issues.update', $issue) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="computer_id" class="form-label">Máy tính:</label>
            <select name="computer_id" id="computer_id" class="form-select" required>
                @foreach ($computers as $computer)
                    <option value="{{ $computer->id }}" {{ $issue->computer_id == $computer->id ? 'selected' : '' }}>
                        {{ $computer->computer_name }} - {{ $computer->model }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="reported_by" class="form-label">Người báo cáo:</label>
            <input type="text" name="reported_by" id="reported_by" class="form-control" value="{{ $issue->reported_by }}" required>
        </div>

        <div class="mb-3">
            <label for="reported_date" class="form-label">Thời gian báo cáo:</label>
            <input type="datetime-local" name="reported_date" id="reported_date" class="form-control" value="{{ $issue->reported_date->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả sự cố:</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ $issue->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="urgency" class="form-label">Mức độ sự cố:</label>
            <select name="urgency" id="urgency" class="form-select" required>
                <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Thấp</option>
                <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Trung bình</option>
                <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>Cao</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái:</label>
            <select name="status" id="status" class="form-select" required>
                <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Mở</option>
                <option value="In Progress" {{ $issue->status == 'In Progress' ? 'selected' : '' }}>Đang xử lý</option>
                <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Đã giải quyết</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật vấn đề</button>
    </form>
</div>

<!-- Thêm link Bootstrap JS vào trước thẻ đóng </body> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
