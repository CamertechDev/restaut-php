<?php
class Order {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function create($items) {
        try {
            $this->db->beginTransaction();

            // Create the order
            $stmt = $this->db->prepare("INSERT INTO orders (total_price) VALUES (?)");
            $totalPrice = $this->calculateTotalPrice($items);
            $stmt->execute([$totalPrice]);
            $orderId = $this->db->lastInsertId();

            // Add order items
            foreach ($items as $item) {
                $stmt = $this->db->prepare("INSERT INTO order_items (order_id, dish_id, quantity, price_at_time) 
                                          VALUES (?, ?, ?, ?)");
                $stmt->execute([
                    $orderId,
                    $item['dish_id'],
                    $item['quantity'],
                    $item['price']
                ]);
            }

            $this->db->commit();
            return $orderId;

        } catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    public function getAll() {
        $stmt = $this->db->query("
            SELECT o.*, GROUP_CONCAT(m.name) as items
            FROM orders o
            LEFT JOIN order_items oi ON o.id = oi.order_id
            LEFT JOIN dishes m ON oi.dish_id = m.id
            GROUP BY o.id
            ORDER BY o.created_at DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("
            SELECT o.*, oi.quantity, oi.price_at_time, m.name as item_name
            FROM orders o
            LEFT JOIN order_items oi ON o.id = oi.order_id
            LEFT JOIN dishes m ON oi.dish_id = m.id
            WHERE o.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStatus($id, $status) {
        $stmt = $this->db->prepare("UPDATE orders SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }

    private function calculateTotalPrice($items) {
        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}