# README.md

# Restaurant Web Application

This is a web application designed for managing restaurant operations, including menu management, order processing, and reservations.

## Features

- **Menu Management**: Add, remove, and view menu items.
- **Order Processing**: Create, view, and cancel orders.
- **Reservation Management**: Create, view, and cancel reservations.

## Project Structure

```
restaurant-web-app
├── src
│   ├── controllers
│   ├── models
│   ├── views
│   ├── config
│   └── public
├── composer.json
└── README.md

restaurant-web-app/
├── src/
│   ├── public/
│   │   └── index.php
│   ├── views/
│   │   ├── home/
│   │   │   └── index.php  (missing file)
│   │   ├── layouts/
│   │   │   └── main.php
│   │   ├── menu/
│   │   ├── orders/
│   │   └── reservations/
```

## Installation

1. Clone the repository:
   ```
   git clone <repository-url>
   ```
2. Navigate to the project directory:
   ```
   cd restaurant-web-app
   ```
3. Install dependencies using Composer:
   ```
   composer install
   ```

## Usage

- Access the application by navigating to `src/public/index.php` in your web browser.
- Follow the on-screen instructions to manage the menu, orders, and reservations.

## Contributing

## logique
jutilise le PDO pour les opérations de base de données
Implémentent les opérations CRUD (Create, Read, Update, Delete)
Gèrent les transactions pour les commandes

Pour utiliser ces modèles, vous devrez:

Injecter l'instance PDO lors de la création des objets
Gérer les erreurs avec try/catch
Mettre à jour vos contrôleurs pour utiliser ces méthodes
## License

This project is licensed under the MIT License. See the LICENSE file for details.

## base de données
CREATE DATABASE IF NOT EXISTS restaurant_db;
USE restaurant_db;

-- Table des plats du menu
CREATE TABLE menus (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    category VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des commandes
CREATE TABLE orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    total_price DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table de liaison entre commandes et plats
CREATE TABLE order_items (
    order_id INT,
    dish_id INT,
    quantity INT NOT NULL DEFAULT 1,
    price_at_time DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (dish_id) REFERENCES dishes(id),
    PRIMARY KEY (order_id, dish_id)
);

-- Table des réservations
CREATE TABLE reservations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    customer_name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    email VARCHAR(100),
    reservation_date DATE NOT NULL,
    reservation_time TIME NOT NULL,
    number_of_guests INT NOT NULL,
    status ENUM('pending', 'confirmed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Données de test pour le menu
INSERT INTO dishes (name, description, price, category) VALUES 
('Pizza Margherita', 'Tomate, mozzarella, basilic', 12.99, 'Pizzas'),
('Burger Classic', 'Boeuf, salade, tomate, fromage', 14.99, 'Burgers'),
('Salade César', 'Laitue, poulet, parmesan, croûtons', 9.99, 'Salades');