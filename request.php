<?php
require_once "vendor/autoload.php";
 
use GuzzleHttp\Client;
 
$client = new Client([
    'base_uri' => 'http://5.35.101.235',
]);
 
$response = $client->request('GET', '', [
    'query' => [
        'page' => '2',
    ]
]);
 
$body = $response->getBody();
$arr_body = json_decode($body);
print_r($arr_body);
