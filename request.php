<?php 

$opts = array(
  "http" => array(
    "method" => "POST",
    "header" => "Accept: application/xml\r\n",
    "content" => '999999'
  )
);

$context = stream_context_create($opts);
$response = file_get_contents($url, false, $context);
$ch = curl_init('http://5.35.101.235/');
curl_setopt($ch, CURLOPT_PUT, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth '));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$res = curl_exec($ch);
curl_close($ch);

$res = json_decode($res, true);
print_r($res);
?>
