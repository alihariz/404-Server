<?php
header("Content-Type: application/json");

// Include the database connection
require_once '../config/db.php';

// Get the path from the URL
$requestUri = $_SERVER['REQUEST_URI'];

// Remove the `/404-Server/api/` part of the URL to get the endpoint
$endpoint = str_replace('/404-Server/api/', '', $requestUri);

// Switch based on the endpoint
switch ($endpoint) {
    case 'getTransactions.php':
        require_once 'getTransactions.php';
        break;
    case 'createTransaction.php':
        require_once 'createTransaction.php';
        break;
    case 'updateTransaction.php':
        require_once 'updateTransaction.php';
        break;
    case 'deleteTransaction.php':
        require_once 'deleteTransaction.php';
        break;
    default:
        echo json_encode(["message" => "Endpoint not found"]);
        http_response_code(404);
        break;
}
?>
