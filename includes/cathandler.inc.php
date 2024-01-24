<?php

try {
    require_once "dbh.inc.php";

    $query = " SELECT * FROM ver_categorias";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    $stmt = null;
    
} catch (PDOExeption $e) {
    die("Query failed: " . e->getMessage());
}