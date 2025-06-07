<?php
// Include the OrderController
require_once '../../controllers/OrderController.php';

// Create an instance of the OrderController
$orderController = new OrderController();

// Fetch the orders using the OrderController
$orders = $orderController->getOrders();

// Display the orders in a table format
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
    <h1>Order Management</h1>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Menu Items</th>
                <th>Total Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo htmlspecialchars($order->id); ?></td>
                    <td><?php echo htmlspecialchars(implode(', ', $order->menuItems)); ?></td>
                    <td><?php echo htmlspecialchars($order->totalPrice); ?></td>
                    <td><?php echo htmlspecialchars($order->status); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>