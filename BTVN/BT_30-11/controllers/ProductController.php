<?php
require_once __DIR__ . '/../models/Product.php';

class ProductController{
    private $productModel;
    public function __construct()
    {
        $this->productModel = new Product();
    }
    public function index()
    {
        $products =  $this->productModel->getAll();
        include '../views/products/index.php';
    }
    public function add(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->productModel->add($_POST);
            header('Location: /');
        }
        require '../views/products/add.php';
    }
    public function update($id){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->productModel->update($id, $_POST);
            header('Location: /');
        }
        $product = $this->productModel->getByID($id);
        require '../views/products/update.php';
    }
    public function delete($id)
    {
        $this->productModel->delete($id);
        require '../views/products/delete.php';
    }
}
?>