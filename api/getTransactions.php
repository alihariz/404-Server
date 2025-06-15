<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

header("Content-Type: application/json");

require_once '../config/db.php';

// Fetch all transactions from the database
$stmt = $pdo->query("SELECT * FROM transactions");
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($transactions);
http_response_code(200);
?>
