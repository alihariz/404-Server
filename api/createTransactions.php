<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

header("Content-Type: application/json");

require_once '../config/db.php';

// Read the raw POST data
$data = json_decode(file_get_contents("php://input"));

// Check if all required fields are provided
if (!isset($data->category, $data->amount, $data->date)) {
    echo json_encode(["message" => "Missing required fields."]);
    http_response_code(400);
    exit;
}

// Prepare the SQL statement
$stmt = $pdo->prepare("INSERT INTO transactions (category, amount, date, description) VALUES (?, ?, ?, ?)");
$stmt->execute([$data->category, $data->amount, $data->date, $data->description ?? null]);

echo json_encode(["message" => "Transaction created successfully."]);
http_response_code(201);
?>
