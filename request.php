 
<?php 
require_once('vendor/autoload.php');

$client = new GuzzleHttp\Client(['base_uri' => 'http://5.35.101.235/']);

//$response = $client->get('http://5.35.101.235/index.php');
$response = $client->request('GET', 'test');
var_dump($response);
?>
