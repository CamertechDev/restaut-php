<?php
define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/config/database.php';
require_once BASE_PATH . '/controllers/MenuController.php';
require_once BASE_PATH . '/controllers/OrderController.php';
require_once BASE_PATH . '/controllers/ReservationController.php';

// Initialize controllers with PDO
$menuController = new MenuController($pdo);
$orderController = new OrderController($pdo);
$reservationController = new ReservationController($pdo);


// Start output buffering
ob_start();

// Get the URL path
$url = isset($_GET['url']) ? $_GET['url'] : '';
$url = rtrim($url, '/');

// Routing
switch ($url) {
    case '':
    case 'home':
        $pageTitle = "Accueil";
        require_once BASE_PATH . '/views/home/index.php';
        break;
        
    case 'menu':
        $pageTitle = "Notre Menu";
        $menuItems = $menuController->getMenu();
        require_once '../views/menu/index.php';
        break;
        
    case 'reservations':
        $pageTitle = "Réservations";
        $reservations = $reservationController->getReservation();
        require_once '../views/reservations/index.php';
        break;
        
    case 'orders':
        $pageTitle = "Commandes";
        $orders = $orderController->getOrder();
        require_once '../views/orders/index.php';
        break;
        
    default:
        $pageTitle = "404 - Page non trouvée";
        http_response_code(404);
        echo "<h1>404 - Page non trouvée</h1>";
        echo "<p>La page demandée n'existe pas.</p>";
}

// Get the buffered content
$content = ob_get_clean();

// Include the layout with the content
require_once '../views/layouts/main.php';
?>