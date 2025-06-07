<?php
require_once '../config/database.php';
require_once '../controllers/MenuController.php';
require_once '../controllers/OrderController.php';
require_once '../controllers/ReservationController.php';

// Initialize controllers
$menuController = new MenuController();
$orderController = new OrderController();
$reservationController = new ReservationController();

// Simple routing logic
$requestUri = $_SERVER['REQUEST_URI'];

if (strpos($requestUri, '/menu') === 0) {
    $menuController->getMenu();
} elseif (strpos($requestUri, '/orders') === 0) {
    $orderController->getOrder();
} elseif (strpos($requestUri, '/reservations') === 0) {
    $reservationController->getReservation();
} else {
    // Default action
    echo "Welcome to the Restaurant Application!";
}
?>