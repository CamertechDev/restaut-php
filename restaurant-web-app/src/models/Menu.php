<?php
class Menu {
    private $db;
    private $id;
    private $name;
    private $price;

    public function __construct($pdo, $id = null, $name = null, $price = null) {
        $this->db = $pdo;
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getAllDishes() {
        $stmt = $this->db->query("SELECT * FROM dishes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addDish($name, $description, $price, $category) {
        $sql = "INSERT INTO dishes (name, description, price, category) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$name, $description, $price, $category]);
    }
}