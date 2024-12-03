<?php
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $file = 'products.json';

    if (file_exists($file)) {
        $products = json_decode(file_get_contents($file), true);
        $productExists = false;

        foreach ($products as $index => $product) {
            if ($product['id'] === $id) {
                unset($products[$index]);
                $productExists = true;
                break;
            }
        }
        if ($productExists) {
            $products = array_values($products);
            file_put_contents($file, json_encode($products, JSON_PRETTY_PRINT));
        }
    }
    header("Location: index.php");
} else {
    echo "Invalid product ID.";
}
exit();
?>
