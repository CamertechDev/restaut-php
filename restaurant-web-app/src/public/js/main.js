document.addEventListener('DOMContentLoaded', function() {
    // Filtrage du menu par catégorie
    const categoryButtons = document.querySelectorAll('.menu-categories .btn');
    categoryButtons.forEach(button => {
        button.addEventListener('click', () => {
            const category = button.dataset.category;
            filterMenuItems(category);
        });
    });

    // Gestion du panier
    const cartButtons = document.querySelectorAll('.add-to-cart');
    cartButtons.forEach(button => {
        button.addEventListener('click', () => {
            const itemId = button.dataset.id;
            addToCart(itemId);
        });
    });
});

function filterMenuItems(category) {
    const menuItems = document.querySelectorAll('.menu-item');
    menuItems.forEach(item => {
        if (category === 'all' || item.dataset.category === category) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

function addToCart(itemId) {
    // Implémentation du panier à venir
    console.log(`Added item ${itemId} to cart`);
}