<?php
// Configuration MySQL - Modifier avec vos accès InfinityFree
$host     = 'localhost';      // Remplacer par : sqlXXX.epizy.com (InfinityFree)
$dbname   = 'agre_custom';    // Remplacer par : epiz_XXXXXX_agre (InfinityFree)
$user     = 'root';           // Remplacer par : epiz_XXXXXX (InfinityFree)
$password = '';               // Remplacer par : votre_mot_de_passe (InfinityFree)

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
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
