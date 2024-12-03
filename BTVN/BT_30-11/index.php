<?php
require 'controllers/ProductController.php';

$controller = new ProductController();

$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'add':
        $controller->add();
        break;
    case 'edit':
        $controller->update($id);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    default:
        $controller->index();
        break;
}
