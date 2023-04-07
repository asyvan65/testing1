<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM `products` ORDER BY `date_added`');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>