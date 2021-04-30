<?php

header('Content-Type: application/json');

require_once '../database/db_config.local.php';


$data = [
  'firstname' => $_POST['firstname'],
  'lastname' => $_POST['lastname'],
  'patronomic' => $_POST['patronomic'],
  'phone' => $_POST['phone'],
  'email' => $_POST['email'],
];

// Очень плохо
$user = $dbh
->prepare ("
  INSERT INTO users (firstname, lastname, patronomic, phone, email) 
  VALUES (:firstname, :lastname, :patronomic, :phone, :email)
  ")
->execute($data);


$result = array(
  'data'  => $data,
);

echo json_encode($result);
?>