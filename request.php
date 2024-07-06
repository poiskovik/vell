<?php 
require_once('vendor/autoload.php');

$client = new \GuzzleHttp\Client();

$response = $client->request('GET', '/', [
  'headers' => [
    'accept' => 'application/json',
  ],
]);

echo $response->getBody();
