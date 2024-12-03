<?php
require_once '../controllers/ProductController.php';
function route($uri) {
    $controller = new ProductController();
    if ($uri === '/' || $uri === '/index.php') {
        $controller->index();
    } elseif ($uri === '/product/add') {
        $controller->add();
    } elseif (preg_match('/^\/product\/edit\/(\d+)$/', $uri, $matches)) {
        $controller->update($matches[1]);
    } elseif (preg_match('/^\/product\/delete\/(\d+)$/', $uri, $matches)) {
        $controller->delete($matches[1]);
    } else {
        echo "404 Not Found";
    }
}
