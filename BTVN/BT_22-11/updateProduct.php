<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ POST
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Xử lý upload ảnh nếu có
    $image = null;
    if (!empty($_FILES['image']['name'])) {
        $image = 'images/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }

    // Đọc dữ liệu từ file JSON
    $filePath = 'products.json';
    if (!file_exists($filePath)) {
        die("File products.json không tồn tại!");
    }

    $products = json_decode(file_get_contents($filePath), true);
    foreach ($products as &$product) {
        if ($product['id'] == $id) {
            $product['name'] = $name;
            $product['price'] = $price;
            $product['description'] = $description;
            if ($image) {
                $product['image'] = $image;
            }
            break;
        }
    }
    if (file_put_contents($filePath, json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES))) {
        header('Location: index.php');
        exit;
    } else {
        die("Failed update file JSON!");
    }
}
?>
