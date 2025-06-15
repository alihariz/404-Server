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

// Delete the transaction
$stmt = $pdo->prepare("DELETE FROM transactions WHERE id = ?");
$stmt->execute([$id]);

echo json_encode(["message" => "Transaction deleted successfully."]);
http_response_code(200);
?>
