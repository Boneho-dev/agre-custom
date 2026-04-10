<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
error_log('=== CART_LOGIC.PHP START ===');
error_log('Session ID: ' . session_id());

// Initialiser le panier s'il n'existe pas
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
    error_log('Cart initialized empty');
}
error_log('Current cart: ' . print_r($_SESSION['cart'], true));

// Ajouter un produit au panier
function addToCart($productId, $name, $price, $image, $description)
{
    error_log('Adding product: ' . $productId . ' - ' . $name);

    if (!isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] = [
            'id' => $productId,
            'name' => $name,
            'price' => $price,
            'image' => $image,
            'description' => $description,
            'quantity' => 1
        ];
        error_log('New product added to cart');
    } else {
        $_SESSION['cart'][$productId]['quantity'] += 1;
        error_log('Quantity incremented for existing product. New qty: ' . $_SESSION['cart'][$productId]['quantity']);
    }
}

// Mettre à jour la quantité d'un produit
function updateQuantity($productId, $quantity)
{
    if (isset($_SESSION['cart'][$productId])) {
        if ($quantity > 0) {
            $_SESSION['cart'][$productId]['quantity'] = $quantity;
        } else {
            unset($_SESSION['cart'][$productId]);
        }
    }
    return count($_SESSION['cart']);
}

// Supprimer un produit du panier
function removeFromCart($productId)
{
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }
    return count($_SESSION['cart']);
}

// Vider le panier
function clearCart()
{
    $_SESSION['cart'] = [];
    return 0;
}

// Calculer le total du panier
function getCartTotal()
{
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

// Obtenir le nombre d'articles dans le panier
function getCartCount()
{
    $count = 0;
    foreach ($_SESSION['cart'] as $item) {
        $count += $item['quantity'];
    }
    return $count;
}

// Gestion des requêtes AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    header('Content-Type: application/json');

    switch ($action) {
        case 'add':
            $productId = $_POST['product_id'] ?? uniqid();
            $name = $_POST['name'] ?? '';
            $price = floatval($_POST['price'] ?? 0);
            $image = $_POST['image'] ?? '';
            $description = $_POST['description'] ?? '';

            addToCart($productId, $name, $price, $image, $description);
            $count = getCartCount();
            error_log('After add - Cart count: ' . $count);
            error_log('Cart contents: ' . print_r($_SESSION['cart'], true));
            echo json_encode(['success' => true, 'count' => $count]);
            break;

        case 'update':
            $productId = $_POST['product_id'] ?? '';
            $quantity = intval($_POST['quantity'] ?? 1);

            $count = updateQuantity($productId, $quantity);
            $total = getCartTotal();
            echo json_encode(['success' => true, 'count' => $count, 'total' => $total]);
            break;

        case 'remove':
            $productId = $_POST['product_id'] ?? '';

            $count = removeFromCart($productId);
            $total = getCartTotal();
            echo json_encode(['success' => true, 'count' => $count, 'total' => $total]);
            break;

        case 'clear':
            $count = clearCart();
            echo json_encode(['success' => true, 'count' => $count]);
            break;

        case 'get_count':
            $count = getCartCount();
            echo json_encode(['success' => true, 'count' => $count]);
            break;

        default:
            echo json_encode(['success' => false, 'error' => 'Action invalide']);
    }
    exit;
}
