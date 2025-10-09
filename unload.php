<?php

require_once 'config.php';

header('Content-Type: application/json');

if (isset($_GET['datetime'])) {
    $datetime = $_GET['datetime'];
} else {
    $datetime = '2025-10-07 11:00:00';
}

if (empty($datetime)) {
    echo json_encode(['error' => 'Datetime parameter is required.']);
    exit;
}

try {
    $pdo = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * FROM UV_Index WHERE datetime = ? ORDER BY location DESC";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$datetime]);

    $results = $stmt->fetchAll();

    echo json_encode($results);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>