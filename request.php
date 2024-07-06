<?php
$xml='id=1';

$opts = array(
  "http" => array(
    "method" => "PUT",
    "header" => "Accept: application/xml\r\n",
    "content" => $xml
  )
);
print_r($opts);

$context = stream_context_create($opts);
//$response = file_get_contents($url, false, $context);

print_r($response);
?>
