<?php

namespace app;

use app\models\Product;

class Database
{

    public \PDO $pdo;
    public static Database $db;
    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=localhost;port=3307;dbname=products_db', 'root', '');
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        self::$db = $this;
    }

    public function getProducts($search = '')
    {
        if ($search) {
            $result = $this->pdo->prepare("SELECT * FROM products WHERE title LIKE '$search%' ORDER BY date DESC");
        } else {
            $result = $this->pdo->prepare("SELECT * FROM products ORDER BY date DESC");
        }

        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createProduct(Product $product)
    {
        $statement = $this->pdo->prepare("INSERT INTO products (title,description,image,price,date) VALUES (:title,:description,:image,:price,:date)");
        $statement->bindValue(':title', $product->title);
        $statement->bindValue(':description', $product->description);
        $statement->bindValue(':image', $product->imagePath);
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':date', date('Y-m-d H:i:s', time()));
        $statement->execute();
    }

    public function deleteProduct($id)
    {
        $statement = $this->pdo->prepare("DELETE FROM products WHERE id=:id");
        $statement->bindValue(':id', $id);
        $statement->execute();
    }

    public function getProductById($id)
    {
        $statement1 = $this->pdo->prepare("SELECT * FROM products WHERE id= :id");
        $statement1->bindValue(':id', $id);
        $statement1->execute();
        return $statement1->fetch(\PDO::FETCH_ASSOC);
    }

    public function updateProduct(Product $product)
    {

        $statement = $this->pdo->prepare("UPDATE products SET title= :title,description = :description ,image= :image,price = :price WHERE id=:id");
        $statement->bindValue(':title', $product->title);
        $statement->bindValue(':description', $product->description);
        $statement->bindValue(':image', $product->imagePath);
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':id', $product->id);
        $statement->execute();
    }
}
