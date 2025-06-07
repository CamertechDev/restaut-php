<?php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Web App</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <h1>Welcome to Our Restaurant</h1>
        <nav>
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/menu">Menu</a></li>
                <li><a href="/reservations">Réservations</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <!-- Main content will be injected here -->
        <?php echo $content; ?>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Our Restaurant. All rights reserved.</p>
    </footer>
    <script src="/js/main.js"></script>
</body>
</html>