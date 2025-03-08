<?php
require 'database.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['title']) || empty($data['title'])) {
    echo json_encode(["error" => "Title is required"]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO tasks (title, description, status) VALUES (:title, :description, :status)");
$stmt->execute([
    ':title' => $data['title'],
    ':description' => $data['description'] ?? '',
    ':status' => $data['status'] ?? 'pending'
]);

echo json_encode(["message" => "Task added successfully", "task_id" => $conn->lastInsertId()]);
