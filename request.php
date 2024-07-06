 <?php
require_once "vendor/autoload.php";
 
use GuzzleHttp\Psr7\Request;
 
$client->request('GET', '/');
// Throws a GuzzleHttp\Exception\ServerException

$res = $client->request('GET', '/', ['http_errors' => false]);
echo $res->getStatusCode();
echo "iiiiiiii";
