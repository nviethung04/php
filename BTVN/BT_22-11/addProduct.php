<?php
$products = [];
if (file_exists('products.json')) {
    $jsonData = file_get_contents('products.json');
    $products = json_decode($jsonData, true);
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $image = '';
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $targetDir = 'images/';
        $targetFile = $targetDir.basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

        if(in_array($imageFileType, ['jpg','jpeg', 'png', 'gif'])){
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $image = $targetFile;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }else{
            echo "Only image files are allowed (jpg, jpeg, png, gif).";
        }
    }
    if ($name && $price && $description && $image) {
        $lastId = 0;
        if (!empty($products)) {
            $lastProduct = end($products);
            $lastId = intval($lastProduct['id']);
        }
        $newId = str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);

        $newProduct = [
            'id' => $newId,
            'image' => $image,
            'name' => $name,
            'price' => $price,
            'description' => $description
        ];
        $products[] = $newProduct;
    }
    file_put_contents('products.json', json_encode($products, JSON_PRETTY_PRINT));
    header("Location: index.php");
    exit();
}
?>