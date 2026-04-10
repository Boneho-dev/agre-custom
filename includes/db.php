<?php
// Configuration Railway (production) avec fallback localhost (développement)
$host     = getenv('MYSQLHOST') ?: 'localhost';
$port     = getenv('MYSQLPORT') ?: '3306';
$dbname   = getenv('MYSQLDATABASE') ?: 'agre_custom';
$user     = getenv('MYSQLUSER') ?: 'root';
$password = getenv('MYSQLPASSWORD') ?: '';

try {
    // Construction du DSN avec port si disponible
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

    $pdo = new PDO(
        $dsn,
        $user,
        $password,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );
} catch (PDOException $e) {
    error_log('Database connection error: ' . $e->getMessage());
    die('Erreur de connexion à la base de données. Veuillez réessayer plus tard.');
}
