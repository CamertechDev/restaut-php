<?php
require_once '../../controllers/MenuController.php';

$menuController = new MenuController();
$menuItems = $menuController->getMenu();

?>

<?php require_once '../layouts/main.php'; ?>

<div class="menu-container">
    <h2>Notre Menu</h2>
    
    <div class="menu-categories">
        <button class="btn" data-category="all">Tous</button>
        <button class="btn" data-category="Entrées">Entrées</button>
        <button class="btn" data-category="Plats">Plats</button>
        <button class="btn" data-category="Desserts">Desserts</button>
    </div>

    <div class="menu-grid">
        <?php foreach ($menuItems as $item): ?>
            <div class="menu-item" data-category="<?php echo htmlspecialchars($item->category); ?>">
                <h3><?php echo htmlspecialchars($item->name); ?></h3>
                <p class="description"><?php echo htmlspecialchars($item->description); ?></p>
                <p class="price"><?php echo number_format($item->price, 2); ?> €</p>
                <button class="btn btn-secondary add-to-cart" data-id="<?php echo $item->id; ?>">
                    Ajouter au panier
                </button>
            </div>
        <?php endforeach; ?>
    </div>
</div>