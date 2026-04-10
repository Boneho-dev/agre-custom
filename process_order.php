<?php
// Démarrer la session avant tout output
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'includes/cart_logic.php';
require_once 'includes/db.php';

// ── Gardes ────────────────────────────────────────────────────────────────────

if (empty($_SESSION['cart']) || getCartCount() === 0) {
    echo "<script>window.location.href='index.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['place_order'])) {
    echo "<script>window.location.href='checkout.php';</script>";
    exit;
}

// ── Récupération & nettoyage des données ──────────────────────────────────────

$email    = filter_var(trim($_POST['email']   ?? ''), FILTER_SANITIZE_EMAIL);
$phone    = trim($_POST['phone']    ?? '');
$fullname = trim($_POST['fullname'] ?? '');
$address  = trim($_POST['address']  ?? '');
$city     = trim($_POST['city']     ?? '');
$zipcode  = trim($_POST['zipcode']  ?? '');
$payment  = in_array($_POST['payment'] ?? '', ['card', 'paypal']) ? $_POST['payment'] : 'card';

// ── Validation ────────────────────────────────────────────────────────────────

$errors = [];

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Adresse email invalide.';
}
if (empty($phone)) {
    $errors[] = 'Numéro de téléphone requis.';
}
if (empty($fullname)) {
    $errors[] = 'Nom complet requis.';
}
if (empty($address)) {
    $errors[] = 'Adresse de livraison requise.';
}
if (empty($city)) {
    $errors[] = 'Ville requise.';
}
if (empty($zipcode)) {
    $errors[] = 'Code postal requis.';
}

if (!empty($errors)) {
    $_SESSION['checkout_errors'] = $errors;
    $_SESSION['checkout_data']   = $_POST;
    echo "<script>window.location.href='checkout.php';</script>";
    exit;
}

// ── Insertion en base de données ──────────────────────────────────────────────

$total       = getCartTotal();
$orderNumber = 'AG-' . date('Ymd') . '-' . rand(1000, 9999);

try {
    $pdo->beginTransaction();

    // 1. Insérer la commande
    $stmt = $pdo->prepare("
        INSERT INTO orders
            (order_number, customer_name, email, phone, address, city, zipcode, payment_method, total_amount, status)
        VALUES
            (:order_number, :customer_name, :email, :phone, :address, :city, :zipcode, :payment_method, :total_amount, 'pending')
    ");

    $stmt->execute([
        ':order_number'    => $orderNumber,
        ':customer_name'   => $fullname,
        ':email'           => $email,
        ':phone'           => $phone,
        ':address'         => $address,
        ':city'            => $city,
        ':zipcode'         => $zipcode,
        ':payment_method'  => $payment,
        ':total_amount'    => $total,
    ]);

    $orderId = $pdo->lastInsertId();

    // 2. Insérer chaque article du panier
    $stmtItem = $pdo->prepare("
        INSERT INTO order_items
            (order_id, product_id, product_name, price, quantity, subtotal)
        VALUES
            (:order_id, :product_id, :product_name, :price, :quantity, :subtotal)
    ");

    foreach ($_SESSION['cart'] as $productId => $item) {
        $stmtItem->execute([
            ':order_id'     => $orderId,
            ':product_id'   => $productId,
            ':product_name' => $item['name'],
            ':price'        => $item['price'],
            ':quantity'     => $item['quantity'],
            ':subtotal'     => $item['price'] * $item['quantity'],
        ]);
    }

    $pdo->commit();
} catch (PDOException $e) {
    $pdo->rollBack();
    error_log('Order insert error: ' . $e->getMessage());
    $_SESSION['checkout_errors'] = ['Une erreur est survenue lors de l\'enregistrement de la commande.'];
    echo "<script>window.location.href='checkout.php';</script>";
    exit;
}

// ── Préparer la session succès & vider le panier ──────────────────────────────

$_SESSION['customer_name']  = $fullname;
$_SESSION['order_number']   = $orderNumber;
$_SESSION['order_total']    = $total;

unset($_SESSION['cart']);
unset($_SESSION['checkout_errors']);
unset($_SESSION['checkout_data']);

echo "<script>window.location.href='success.php';</script>";
exit;
