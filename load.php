<?php

$data = include('transform.php');

$dataArray = json_decode($data, true);

require_once 'config.php'; // Bindet die Datenbankkonfiguration ein

try {
    $pdo = new PDO($dsn, $username, $password, $options);

    $sql = 'INSERT INTO UV_Index (location, country, latitude, longitude, datetime, uvi) VALUES (?, ?, ?, ?, ?, ?)';

    $stmt = $pdo->prepare($sql);

    foreach ($dataArray as $item) {
        $stmt->execute([
            $item['location'],
            $item['country'],
            $item['latitude'],
            $item['longitude'],
            $item['datetime'],
            $item['uvi']
        ]);
    }

    echo "Daten erfolgreich eingefügt.";
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die("Verbindung zur Datenbank konnte nicht hergestellt werden: " . $e->getMessage());
}
?>