<?php 
require_once('vendor/autoload.php');

$client = new \GuzzleHttp\Client();

$response = $client->request('GET', 'http://5.35.101.235/', [
  'headers' => [
    'accept' => 'application/json',
  ],
]);

//echo $response->getBody();
echo "1";
?>
