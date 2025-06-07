<?php
require_once '../../controllers/MenuController.php';

$menuController = new MenuController();
$menuItems = $menuController->getMenu();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
    <h1>Restaurant Menu</h1>
    <ul>
        <?php foreach ($menuItems as $item): ?>
            <li>
                <strong><?php echo htmlspecialchars($item->name); ?></strong> - $<?php echo htmlspecialchars($item->price); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>