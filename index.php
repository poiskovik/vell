<?php
header("Content-Type: application/json");

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method) {
    case 'GET':
        // Обработка GET запросов
        echo json_encode(["message" => "GET request received"]);
        break;
    case 'POST':
        // Обработка POST запросов
        echo json_encode(["message" => "POST request received"]);
        break;
    case 'PUT':
        // Обработка PUT запросов
        echo json_encode(["message" => "PUT request received"]);
        break;
    case 'DELETE':
        // Обработка DELETE запросов
        echo json_encode(["message" => "DELETE request received"]);
        break;
    default:
        // Обработка других запросов
        http_response_code(405);
        echo json_encode(["message" => "Method not allowed"]);
        break;
}
?>
