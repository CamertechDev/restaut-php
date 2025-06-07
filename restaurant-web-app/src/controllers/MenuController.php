<?php
require_once '../models/Menu.php';
class MenuController {
    private $db;
    private $menuModel;

    public function __construct($pdo) {
        $this->db = $pdo;
        $this->menuModel = new Menu($pdo);
    }

    public function getMenu() {
        try {
            return ["success" => true, "data" => $this->menuModel->getAllDishes()];
        } catch (PDOException $e) {
            return ["success" => false, "message" => "Database error: " . $e->getMessage()];
        }
    }

    public function addMenuItem($data) {
        try {
            if ($this->menuModel->addDish($data['name'], $data['description'], $data['price'], $data['category'])) {
                return ["success" => true, "message" => "Menu item added successfully"];
            }
            return ["success" => false, "message" => "Failed to add menu item"];
        } catch (PDOException $e) {
            return ["success" => false, "message" => "Database error: " . $e->getMessage()];
        }
    }
}