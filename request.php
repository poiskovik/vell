<?php 
//$post=Apost('kolya2','fsefq11wert','1sadm@admd.ru'); //Создание пользователя (имя,пароль,почта)

//$put=Aput('kolya3','rfrasd6fgh','2ghroot@delo.ru'); //Обновление информации пользователя (имя,пароль,почта)

$delete=Adelete('kolya'); //Удаление пользователя (имя)















function Apost ($login,$pass,$email) {
  $ch = curl_init('http://5.35.101.235/');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('name'=>$login,'pass'=>$pass,'email'=>$email)));
  $res = curl_exec($ch);
  curl_close($ch);
  $res = json_decode($res, true);
  print_r($res['message']);
}
function Aput ($login,$pass,$email) {
  $ch = curl_init('http://5.35.101.235/');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('name'=>$login,'pass'=>$pass,'email'=>$email)));
  $res = curl_exec($ch);
  curl_close($ch);
  $res = json_decode($res, true);
  print_r($res['message']);
}
function Adelete ($login) {
  $ch = curl_init('http://5.35.101.235/');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('name'=>$login)));
  $res = curl_exec($ch);
  curl_close($ch);
  $res = json_decode($res, true);
  print_r($res['message']);
}
?>
