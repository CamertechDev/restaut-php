<?php
// reservations/create.php

require_once '../../controllers/ReservationController.php';

$reservationController = new ReservationController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerName = $_POST['customer_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $reservationDate = $_POST['reservation_date'];
    $reservationTime = $_POST['reservation_time'];
    $numberOfGuests = $_POST['number_of_guests'];

    $reservationController->createReservation($customerName, $phone, $email, $reservationDate, $reservationTime, $numberOfGuests);

    header('Location: /reservations');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Reservation</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
    <?php require_once '../layouts/main.php'; ?>

    <div class="form-container">
        <h2>Nouvelle Réservation</h2>
        <form action="/reservations/create" method="POST">
            <div class="form-group">
                <label for="customer_name">Nom</label>
                <input type="text" id="customer_name" name="customer_name" required>
            </div>

            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input type="tel" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="reservation_date">Date</label>
                <input type="date" id="reservation_date" name="reservation_date" required>
            </div>

            <div class="form-group">
                <label for="reservation_time">Heure</label>
                <input type="time" id="reservation_time" name="reservation_time" required>
            </div>

            <div class="form-group">
                <label for="number_of_guests">Nombre de personnes</label>
                <input type="number" id="number_of_guests" name="number_of_guests" min="1" required>
            </div>

            <button type="submit" class="btn">Réserver</button>
        </form>
    </div>
</body>
</html>