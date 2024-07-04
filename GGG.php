<?php
// Setup database connection
$host = 'localhost';
$db   = 'postgres';
$user = 'postgres';
$pass = '123456';

$dsn = "pgsql:host=$host;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Pagination setup
$productsPerPage = 4;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $productsPerPage;

// Fetch products from database
$sql = "SELECT * FROM product LIMIT :limit OFFSET :offset";
$stmt = $pdo->prepare($sql);
$stmt->execute(['limit' => $productsPerPage, 'offset' => $offset]);
$products = $stmt->fetchAll();

// Send JSON response back to JavaScript
header('Content-Type: application/json');
echo json_encode(['product' => $products]);
?>