<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Post</title>
</head>
<body>
<h1>Create New Post</h1>

<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div>
        <label for="content">Content</label>
        <textarea name="content" id="content" required></textarea>
    </div>
    <button type="submit">Create Post</button>
</form>

<a href="{{ route('posts.index') }}">Back to Posts List</a>
</body>
</html>
