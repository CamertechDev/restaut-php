<?php
require_once '../models/Reservation.php';

class ReservationController {
    private $db;
    private $reservationModel;

    public function __construct($pdo) {
        $this->db = $pdo;
        $this->reservationModel = new Reservation($pdo);
    }

    public function createReservation($data) {
        try {
            if ($this->reservationModel->create($data)) {
                return ["success" => true, "message" => "Reservation created successfully"];
            }
            return ["success" => false, "message" => "Failed to create reservation"];
        } catch (PDOException $e) {
            return ["success" => false, "message" => "Database error: " . $e->getMessage()];
        } catch (Exception $e) {
            return ["success" => false, "message" => "Error: " . $e->getMessage()];
        }
    }

    public function getReservation($id = null) {
        try {
            if ($id) {
                $reservation = $this->reservationModel->getById($id);
                if (!$reservation) {
                    return ["success" => false, "message" => "Reservation not found"];
                }
                return ["success" => true, "data" => $reservation];
            }
            
            return ["success" => true, "data" => $this->reservationModel->getAll()];
        } catch (PDOException $e) {
            return ["success" => false, "message" => "Database error: " . $e->getMessage()];
        }
    }

    public function updateReservation($id, $data) {
        try {
            if ($this->reservationModel->update($id, $data)) {
                return ["success" => true, "message" => "Reservation updated successfully"];
            }
            return ["success" => false, "message" => "Failed to update reservation"];
        } catch (PDOException $e) {
            return ["success" => false, "message" => "Database error: " . $e->getMessage()];
        }
    }

    public function cancelReservation($id) {
        try {
            $data = ['status' => 'cancelled'];
            if ($this->reservationModel->update($id, $data)) {
                return ["success" => true, "message" => "Reservation cancelled successfully"];
            }
            return ["success" => false, "message" => "Failed to cancel reservation"];
        } catch (PDOException $e) {
            return ["success" => false, "message" => "Database error: " . $e->getMessage()];
        }
    }
}