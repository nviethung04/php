<?php
    require '../../models/Product.php';
    $productModel = new Product();
    $products = $productModel->getAll();
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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>List Product</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="add.php" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr class="modal-title">
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['ID']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($product['IMAGE']); ?>" alt="Product Image" width="110" height="110"></td>
                            <td><?php echo htmlspecialchars($product['NAME']); ?></td>
                            <td><?php echo htmlspecialchars($product['PRICE']); ?></td>
                            <td><?php echo htmlspecialchars($product['DESCRIPTION']);?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="update.php?id=<?php echo $product['ID']; ?>" class="btn btn-info btn-sm">
                                        <i class="material-icons icon-edit">edit</i>
                                    </a>
                                    <a href="delete.php?id=<?php echo $product['ID']; ?>" class="btn btn-danger btn-sm">
                                        <i class="material-icons icon-delete">delete</i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6">No products found.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
