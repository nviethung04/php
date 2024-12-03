<?php
require '../../models/Product.php';
$productModel = new Product();
$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
    header("Location: index.php");
    exit;
}
$product = $productModel->getByID($id);
if (!$product) {
    echo "Product not found.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? 0;
    $description = $_POST['description'] ?? '';
    $image = $_FILES['image']['name'] ?? '';
    if ($image) {
        $imagePath = '../../image/' . time() . '-' . basename($image);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            echo "Error uploading image.";
            exit;
        }
    } else {
        $imagePath = $product['image'];
    }
    $updateSuccess = $productModel->update($id, [
        'name' => $name,
        'price' => $price,
        'description' => $description,
        'image' => $imagePath
    ]);
    if ($updateSuccess) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error updating product!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CellphoneS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div id="updateProductModal" >
    <div>
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Update Product</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars(isset($product['ID']) ? $product['ID'] : ''); ?>">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name"
                               value="<?php echo htmlspecialchars(isset($product['NAME']) ? $product['NAME'] : ''); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price"
                               value="<?php echo htmlspecialchars(isset($product['PRICE']) ? $product['PRICE'] : ''); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" required><?php echo htmlspecialchars(isset($product['DESCRIPTION']) ? $product['DESCRIPTION'] : ''); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" type="file" name="image">
                        <small class="form-text text-muted">Leave blank if you don't want to change the image.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" id="cancelBtn" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('cancelBtn').addEventListener('click', function () {
        if (document.referrer) {
            window.location.href = document.referrer;
        } else {
            window.location.href = 'index.php';
        }
    });
</script>
</body>
</html>