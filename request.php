<?php
require_once "vendor/autoload.php";
 
use GuzzleHttp\Psr7\Request;
 
$request = new Request('PUT', 'http://5.35.101.235/put');
$response = $client->send($request, ['timeout' => 2]);
