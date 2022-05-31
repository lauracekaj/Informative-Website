<?php
$host = "localhost";
$user = "root";
$password = "";
$database_name = "project";
$attribute = "mysql:host=$host;dbname=$database_name";


try{
  $pdo = new PDO($attribute, $user, $password);
  echo "Lidhja u krye";
  }

  catch( PDOException $error){
    echo "Ka nje gabim ne lidhje: $error->getMessage(), $error->getCode() <br>";
  }
?>
