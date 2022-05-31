<?php


require_once "../FirstDatabase/login.php";



 try{
    $pdo=new PDO($attribute, $user, $password);
    echo "Lidhja u krye me sukses <br>";
}

catch(PDOException $e)
{
  echo "Lidhja nuk u krye, ndodhi nje gabim $e->getMessage() dhe ka nr $e->getCode()";
}


  $id=$_POST["id"];

  $query= "SELECT ID, name, surname, email, password FROM actor WHERE ID='$id'";

  $result=$pdo->query($query);
  $row=$result->fetch();
  echo "<br>Name: ".$row["name"]."<br>";
  echo "Surname: ".$row["surname"]."<br>";
  echo "Email: ".$row["email"]."<br>";
  echo "Password: ".$row["password"]."<br>";


 ?>
