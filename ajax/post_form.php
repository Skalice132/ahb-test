<?php

header('Content-Type: application/json');

$md5code = $_POST['check'];
$code = $_POST['digits'];
$check_code = $md5code === md5($code);

if ($_POST['firstname'] && $_POST['lastname'] && $check_code) {

  require_once '../database/db_config.local.php';

  $data = [
    'firstname' => $_POST['firstname'],
    'lastname' => $_POST['lastname'],
    'patronomic' => $_POST['patronomic'],
    'phone' => $_POST['phone'],
    'email' => $_POST['email'],
    'text' => $_POST['text'],
  ];

  $user = $dbh
  ->prepare ("
    INSERT INTO users (firstname, lastname, patronomic, phone, email, text) 
    VALUES (:firstname, :lastname, :patronomic, :phone, :email, :text)
    ")
  ->execute($data);

  if ($user) {

   $result = array(
    'message'  => 'Запись успешна',
    'data'  => $data,
  );

 } else {
  $result = array(
    'message'  => 'Ошибка записи',
    'data'  => $data,
  );
}

} else {

  $result = array(
    'message'  => 'Ошибка входящих данных',
    'data'  => $data,
  );

}

echo json_encode($result, JSON_UNESCAPED_UNICODE);
exit();

?>