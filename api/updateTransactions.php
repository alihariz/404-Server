<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

header("Content-Type: application/json");

require_once '../config/db.php';

// Get the transaction ID from the URL
$id = $_GET['id'] ?? null;
if (!$id) {
    echo json_encode(["message" => "Transaction ID is required."]);
    http_response_code(400);
    exit;
}

// Read the raw PUT data
$data = json_decode(file_get_contents("php://input"));

// Update the transaction
$stmt = $pdo->prepare("UPDATE transactions SET category = ?, amount = ?, date = ?, description = ? WHERE id = ?");
$stmt->execute([$data->category, $data->amount, $data->date, $data->description ?? null, $id]);

echo json_encode(["message" => "Transaction updated successfully."]);
http_response_code(200);
?>
