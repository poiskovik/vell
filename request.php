<?php 

$post=Apost('jeims','qwert','adm@adm.ru');

function Apost ($login,$pass,$email) {
$ch = curl_init('http://5.35.101.235/');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth '));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('name'=>$login,'pass'=>$pass,'email'=>$email)));
$res = curl_exec($ch);
curl_close($ch);

print_r($res);
$res = json_decode($res, true);
}
?>
