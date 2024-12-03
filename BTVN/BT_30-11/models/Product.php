<?php
require_once __DIR__ . '/../config/database.php';
class Product{
    private $pdo;
    public function __construct()
    {
        try {
            $this->pdo = Database::getConnection();
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
    public function getAll()
    {
        $statement = $this->pdo->query("SELECT * FROM PRODUCT");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getByID($id){
        $statement = $this->pdo->prepare("SELECT * FROM PRODUCT WHERE ID = ?");
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public function add($product) {
        $statement = $this->pdo->prepare("INSERT INTO PRODUCT(NAME, PRICE, DESCRIPTION, IMAGE) VALUES (?, ?, ?, ?)");
        return $statement->execute([$product['name'], $product['price'], $product['description'], $product['image']]);
    }
    public function update($id, $data)
    {
        $statement = $this->pdo->prepare("UPDATE PRODUCT SET NAME = ?, PRICE = ? , DESCRIPTION = ? , IMAGE = ? WHERE ID = ?");
        return $statement->execute([$data['name'], $data['price'], $data['description'], $data['image'], $id]);

    }
    public function delete($id)
    {
        $statement = $this->pdo->prepare("DELETE FROM PRODUCT WHERE ID = ?");
        return $statement->execute([$id]);
    }
}