<?php

require_once "config.php";

header('Content-Type: application/json');

// Zufälligen Datensatz auswählen

try{
    $pdo = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * FROM UV_Index WHERE uvi > 0 ORDER BY RAND() LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($result);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
    die("Verbindung zur Datenbank konnte nicht hergestellt werden: " . $e->getMessage());
}
?>