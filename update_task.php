<?php
require 'database.php';

$id = $_GET['id'] ?? null;
$data = json_decode(file_get_contents("php://input"), true);

if (!$id || !isset($data['title'])) {
    echo json_encode(["error" => "Invalid request"]);
    exit;
}

$stmt = $conn->prepare("UPDATE tasks SET title = :title, description = :description, status = :status WHERE id = :id");
$stmt->execute([
    ':title' => $data['title'],
    ':description' => $data['description'] ?? '',
    ':status' => $data['status'] ?? 'pending',
    ':id' => $id
]);

echo json_encode(["message" => "Task updated successfully"]);
?>