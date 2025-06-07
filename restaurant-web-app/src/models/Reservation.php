<?php
class Reservation {
    private $db;
    private $id;
    private $customerName;
    private $phone;
    private $email;
    private $reservationDate;
    private $reservationTime;
    private $numberOfGuests;
    private $status;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function create($data) {
        $sql = "INSERT INTO reservations (customer_name, phone, email, reservation_date, 
                reservation_time, number_of_guests) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['customer_name'],
            $data['phone'],
            $data['email'],
            $data['reservation_date'],
            $data['reservation_time'],
            $data['number_of_guests']
        ]);
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM reservations ORDER BY reservation_date, reservation_time");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM reservations WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $sql = "UPDATE reservations SET 
                customer_name = ?, 
                phone = ?,
                email = ?,
                reservation_date = ?,
                reservation_time = ?,
                number_of_guests = ?,
                status = ?
                WHERE id = ?";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['customer_name'],
            $data['phone'],
            $data['email'],
            $data['reservation_date'],
            $data['reservation_time'],
            $data['number_of_guests'],
            $data['status'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM reservations WHERE id = ?");
        return $stmt->execute([$id]);
    }
}