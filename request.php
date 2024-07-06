<?php 

//Создание пользователя, вводятся данные - логин, пароль, email
$post=Apost('jeims','qwert','adm@adm.ru');
print_r($post);





function Apost ($login,$pass,$email) {
$ch = curl_init('http://5.35.101.235/');

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER,  array( 'Content-Type: application/json'  );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'yyyu=yjytjyt');//json_encode(array('login='.$login,'pass='.$pass,'email='.$email))
$res = curl_exec($ch);
curl_close($ch);
 
//$res = json_decode($res, true);
print_r($res);
}
?>
