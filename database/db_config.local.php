<?php
try {

    $localhost = '127.0.0.1:3307';
    $test = 'ahb_test';
    
    $user = 'mysql'; 
    $pass = 'mysql';

    $dbh = new PDO("mysql:host=$localhost;dbname=$test", $user, $pass);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>