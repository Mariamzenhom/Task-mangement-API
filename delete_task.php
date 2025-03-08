<?php
require 'database.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo json_encode(["error" => "Invalid task ID"]);
    exit;
}

$stmt = $conn->prepare("DELETE FROM tasks WHERE id = :id");
$stmt->execute([':id' => $id]);

echo json_encode(["message" => "Task deleted successfully"]);
?>