<?php
// Update with your own MySQL credentials
$DB_HOST = 'localhost';
$DB_NAME = 'art_tickets';
$DB_USER = 'root';
$DB_PASS = 'root';

try {
    $pdo = new PDO(
        "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4",
        $DB_USER,
        $DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    exit("DB connection failed: " . $e->getMessage());
}
?>
