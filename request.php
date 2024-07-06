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
