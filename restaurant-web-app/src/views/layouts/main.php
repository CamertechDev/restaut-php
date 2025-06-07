<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - ' : ''; ?>Restaurant Web App</title>
    <base href="/">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Notre Restaurant</h1>
        <nav>
            <ul>
                <li><a href="">Accueil</a></li>
                <li><a href="menu">Menu</a></li>
                <li><a href="reservations">Réservations</a></li>
                <li><a href="orders">Commandes</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php echo $content; ?>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Notre Restaurant. All rights reserved.</p>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>
