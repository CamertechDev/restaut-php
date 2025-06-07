<?php
// reservations/index.php

require_once '../../controllers/ReservationController.php';

$reservationController = new ReservationController();
$reservations = $reservationController->getReservation();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
    <h1>Reservations</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Reservation Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation): ?>
                <tr>
                    <td><?php echo $reservation->id; ?></td>
                    <td><?php echo $reservation->customerName; ?></td>
                    <td><?php echo $reservation->reservationTime; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $reservation->id; ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $reservation->id; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="create.php">Add New Reservation</a>
</body>
</html>