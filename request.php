<?php 
require_once('vendor/autoload.php');

$client = new GuzzleHttp\Client(['base_uri' => 'http://5.35.101.235/']);

$response = $client->get('http://httpbin.org/get');
//$response = $client->request('GET', 'test');
//print_r($response);
?>
