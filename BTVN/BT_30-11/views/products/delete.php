<?php
require '../../models/Product.php';
$productModel = new Product();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    if ($id === null || !is_numeric($id)) {
        header('Location: index.php');
        exit;
    }
    $productModel->delete($id);
    header('Location: index.php');
    exit;
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
<div id="deleteProductModal">
    <div>
        <div class="modal-content">
            <form id="deleteForm" method="POST" action="">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Product</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this product?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="deleteId" value="<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>">
                    <button type="button" class="btn btn-default" id="cancelBtn">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('cancelBtn').addEventListener('click', function () {
        window.location.href = 'index.php'; // Quay lại trang chính
    });
</script>
</body>
</html>
