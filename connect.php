<?php 
$dsn = 'mysql:host=localhost;dbname=moghtrabene';
$user = 'root';
$pass = '';


//$option = [
  //  PDO::MYSQL_ATTR_INIT_COMMAND => 'UTF8',

//];

try {
    $con = new PDO($dsn, $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'failed to connect' . $e->getMessage();
}
?>