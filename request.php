<?php 
//$post=Apost('kolya5','5fsefq11wert','5sadm@admd.ru'); //Создание пользователя (имя,пароль,почта)

//$put=Aput('kolya4','4rfrasd6fgh','4ghroot@delo.ru'); //Обновление информации пользователя (имя,пароль,почта)

//$delete=Adelete('kolya3'); //Удаление пользователя (имя)

$auth=Aauth('kolya5','5fsefq11wert'); //Авторизация пользователя (имя,пароль)













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
function Aauth ($login) {
  $ch = curl_init('http://5.35.101.235/');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('name'=>$login,'pass'=>$pass)));
  $res = curl_exec($ch);
  curl_close($ch);
  print_r($res);
  $res = json_decode($res, true);
  print_r($res['message']);
}
?>
