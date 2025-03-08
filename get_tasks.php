<?php

header('Content-Type: application/json');
require 'database.php';

$stmt = $conn->prepare("SELECT * FROM tasks ORDER BY created_at DESC");
$stmt->execute();
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($tasks);

