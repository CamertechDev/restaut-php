<?php
require_once '../models/Order.php';
class OrderController {
    private $db;
    private $orderModel;

    public function __construct($pdo) {
        $this->db = $pdo;
        $this->orderModel = new Order($pdo);
    }

    public function createOrder($items) {
        try {
            $orderId = $this->orderModel->create($items);
            if ($orderId) {
                return ["success" => true, "message" => "Order created successfully", "orderId" => $orderId];
            }
            return ["success" => false, "message" => "Failed to create order"];
        } catch (PDOException $e) {
            return ["success" => false, "message" => "Database error: " . $e->getMessage()];
        } catch (Exception $e) {
            return ["success" => false, "message" => "Error: " . $e->getMessage()];
        }
    }

    public function getOrder($orderId = null) {
        try {
            if ($orderId) {
                $order = $this->orderModel->getById($orderId);
                if (!$order) {
                    return ["success" => false, "message" => "Order not found"];
                }
                return ["success" => true, "data" => $order];
            }
            
            return ["success" => true, "data" => $this->orderModel->getAll()];
        } catch (PDOException $e) {
            return ["success" => false, "message" => "Database error: " . $e->getMessage()];
        }
    }

    public function updateOrderStatus($orderId, $status) {
        try {
            if ($this->orderModel->updateStatus($orderId, $status)) {
                return ["success" => true, "message" => "Order status updated successfully"];
            }
            return ["success" => false, "message" => "Failed to update order status"];
        } catch (PDOException $e) {
            return ["success" => false, "message" => "Database error: " . $e->getMessage()];
        }
    }
}