 <?php
require_once "vendor/autoload.php";
 
use GuzzleHttp\Psr7\Request;
 
$client->request('GET', '/status/500');
// Throws a GuzzleHttp\Exception\ServerException

$res = $client->request('GET', '/status/500', ['http_errors' => false]);
echo $res->getStatusCode();
echo "iiiiiiii";
